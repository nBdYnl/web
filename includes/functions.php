<?php
/**
 * nBdy — Helper Functions
 * =======================
 */

require_once __DIR__ . '/db.php';

// ── Taalbeheer ─────────────────────────────────────────────

function getCurrentLang(): string {
    // 1. Sessie
    if (!empty($_SESSION['nbdy_lang']) && array_key_exists($_SESSION['nbdy_lang'], $GLOBALS['LANGUAGES'])) {
        return $_SESSION['nbdy_lang'];
    }
    // 2. Browser
    $accept = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? '';
    if (str_starts_with($accept, 'nl')) return 'nl';
    if (str_starts_with($accept, 'de')) return 'de';
    return DEFAULT_LANG;
}

function setLang(string $lang): void {
    if (array_key_exists($lang, $GLOBALS['LANGUAGES'])) {
        $_SESSION['nbdy_lang'] = $lang;
    }
}

function t(string $key, array $params = []): string {
    $lang = getCurrentLang();
    static $translations = [];

    if (!isset($translations[$lang])) {
        $file = __DIR__ . "/lang/{$lang}.php";
        $translations[$lang] = file_exists($file) ? require $file : [];
    }

    $text = $translations[$lang][$key] ?? $key;
    foreach ($params as $k => $v) {
        $text = str_replace("{{$k}}", $v, $text);
    }
    return $text;
}

// ── Thema ──────────────────────────────────────────────────

function getCurrentTheme(): string {
    return $_SESSION['nbdy_theme'] ?? DEFAULT_THEME;
}

function setTheme(string $theme): void {
    if (in_array($theme, $GLOBALS['THEMES'], true)) {
        $_SESSION['nbdy_theme'] = $theme;
    }
}

// ── Gebruiker ────────────────────────────────────────────

function getCurrentUser(): ?array {
    if (!empty($_SESSION['nbdy_user_id'])) {
        $stmt = db()->prepare("SELECT id, email, display_name, avatar_init, role, lang_preference, theme_preference FROM users WHERE id = ? AND is_active = 1");
        $stmt->execute([$_SESSION['nbdy_user_id']]);
        $user = $stmt->fetch();
        if ($user) return $user;
    }
    return null;
}

function isLoggedIn(): bool {
    return getCurrentUser() !== null;
}

function isAdmin(): bool {
    $user = getCurrentUser();
    return $user && $user['role'] === 'admin';
}

function requireLogin(): void {
    if (!isLoggedIn()) {
        header('Location: ' . SITE_URL . '/pages/login.php?redirect=' . urlencode($_SERVER['REQUEST_URI']));
        exit;
    }
}

function requireAdmin(): void {
    requireLogin();
    if (!isAdmin()) {
        http_response_code(403);
        die('Toegang geweigerd.');
    }
}

// ── Security ───────────────────────────────────────────────

function generateCsrfToken(): string {
    if (empty($_SESSION[CSRF_TOKEN_NAME])) {
        $_SESSION[CSRF_TOKEN_NAME] = bin2hex(random_bytes(32));
    }
    return $_SESSION[CSRF_TOKEN_NAME];
}

function validateCsrfToken(string $token): bool {
    return isset($_SESSION[CSRF_TOKEN_NAME]) && hash_equals($_SESSION[CSRF_TOKEN_NAME], $token);
}

function csrfInput(): string {
    return '<input type="hidden" name="csrf_token" value="' . htmlspecialchars(generateCsrfToken()) . '">';
}

function sanitizeInput(string $input): string {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

// ── URL Helpers ────────────────────────────────────────────

function asset(string $path): string {
    return ASSETS_URL . '/' . ltrim($path, '/');
}

function pageUrl(string $page, array $params = []): string {
    $url = SITE_URL . '/pages/' . $page;
    if (!empty($params)) {
        $url .= '?' . http_build_query($params);
    }
    return $url;
}

function storyUrl(string $slug): string {
    return SITE_URL . '/pages/article.php?slug=' . urlencode($slug);
}

function forumUrl(string $slug): string {
    return SITE_URL . '/pages/forum-topic.php?slug=' . urlencode($slug);
}

// ── Formatting ─────────────────────────────────────────────

function formatDate(string $datetime, string $format = 'd.m.Y'): string {
    return date($format, strtotime($datetime));
}

function timeAgo(string $datetime): string {
    $time = strtotime($datetime);
    $now = time();
    $diff = $now - $time;

    $lang = getCurrentLang();

    if ($diff < 60) return $lang === 'nl' ? 'Zojuist' : ($lang === 'de' ? 'Gerade eben' : 'Just now');
    if ($diff < 3600) {
        $m = floor($diff / 60);
        return match($lang) {
            'nl' => "{$m} minuten geleden",
            'de' => "vor {$m} Minuten",
            default => "{$m} minutes ago",
        };
    }
    if ($diff < 86400) {
        $h = floor($diff / 3600);
        return match($lang) {
            'nl' => "{$h} uur geleden",
            'de' => "vor {$h} Stunden",
            default => "{$h} hours ago",
        };
    }
    if ($diff < 604800) {
        $d = floor($diff / 86400);
        return match($lang) {
            'nl' => $d === 1 ? '1 dag geleden' : "{$d} dagen geleden",
            'de' => $d === 1 ? 'vor 1 Tag' : "vor {$d} Tagen",
            default => $d === 1 ? '1 day ago' : "{$d} days ago",
        };
    }
    return formatDate($datetime);
}

function excerpt(string $text, int $length = 150): string {
    $text = strip_tags($text);
    if (mb_strlen($text) <= $length) return $text;
    return mb_substr($text, 0, $length) . '...';
}

// ── Data Fetchers ────────────────────────────────────────

function getSiteSetting(string $key): ?string {
    static $cache = [];
    if (!isset($cache[$key])) {
        $stmt = db()->prepare("SELECT setting_value FROM site_settings WHERE setting_key = ?");
        $stmt->execute([$key]);
        $row = $stmt->fetch();
        $cache[$key] = $row['setting_value'] ?? null;
    }
    return $cache[$key];
}

function getCategories(): array {
    $stmt = db()->query("SELECT * FROM categories ORDER BY sort_order, id");
    return $stmt->fetchAll();
}

function getFeaturedStory(): ?array {
    $stmt = db()->prepare("
        SELECT s.*, c.name_nl, c.name_en, c.name_de, c.color
        FROM stories s
        LEFT JOIN categories c ON s.category_id = c.id
        WHERE s.status = 'published' AND s.is_featured = 1
        ORDER BY s.published_at DESC
        LIMIT 1
    ");
    $stmt->execute();
    return $stmt->fetch() ?: null;
}

function getRecentStories(int $limit = 3, int $excludeId = 0): array {
    $sql = "
        SELECT s.*, c.name_nl, c.name_en, c.name_de, c.color
        FROM stories s
        LEFT JOIN categories c ON s.category_id = c.id
        WHERE s.status = 'published'
    ";
    $params = [];
    if ($excludeId > 0) {
        $sql .= " AND s.id != ?";
        $params[] = $excludeId;
    }
    $sql .= " ORDER BY s.published_at DESC LIMIT ?";
    $params[] = $limit;

    $stmt = db()->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll();
}

function getStoryBySlug(string $slug): ?array {
    $stmt = db()->prepare("
        SELECT s.*, c.name_nl, c.name_en, c.name_de, c.color,
               u.display_name as author_name, u.avatar_init
        FROM stories s
        LEFT JOIN categories c ON s.category_id = c.id
        LEFT JOIN users u ON s.author_id = u.id
        WHERE s.slug = ? AND s.status = 'published'
    ");
    $stmt->execute([$slug]);
    return $stmt->fetch() ?: null;
}

function getForumTopics(int $limit = 6): array {
    $stmt = db()->prepare("SELECT t.*, c.name_nl, c.name_en, c.name_de, c.color FROM forum_topics t LEFT JOIN categories c ON t.category_id = c.id WHERE t.status != 'closed' ORDER BY t.last_reply_at DESC, t.created_at DESC LIMIT ?");
    $stmt->execute([$limit]);
    return $stmt->fetchAll();
}

function getForumTopicBySlug(string $slug): ?array {
    $stmt = db()->prepare("SELECT t.*, c.name_nl, c.name_en, c.name_de, c.color, u.display_name as author_name, u.avatar_init FROM forum_topics t LEFT JOIN categories c ON t.category_id = c.id LEFT JOIN users u ON t.author_id = u.id WHERE t.slug = ?");
    $stmt->execute([$slug]);
    return $stmt->fetch() ?: null;
}

function getForumReplies(int $topicId): array {
    $stmt = db()->prepare("SELECT r.*, u.display_name as author_name, u.avatar_init FROM forum_replies r LEFT JOIN users u ON r.author_id = u.id WHERE r.topic_id = ? ORDER BY r.created_at ASC");
    $stmt->execute([$topicId]);
    return $stmt->fetchAll();
}

function getTestimonials(): array {
    $stmt = db()->query("SELECT * FROM testimonials WHERE is_active = 1 ORDER BY sort_order, id");
    return $stmt->fetchAll();
}

function getActiveExercise(): ?array {
    $stmt = db()->prepare("SELECT * FROM exercises WHERE is_active = 1 AND week_start <= CURDATE() ORDER BY week_start DESC LIMIT 1");
    $stmt->execute();
    return $stmt->fetch() ?: null;
}

function incrementStoryViews(int $id): void {
    $stmt = db()->prepare("UPDATE stories SET view_count = view_count + 1 WHERE id = ?");
    $stmt->execute([$id]);
}

function incrementForumViews(int $id): void {
    $stmt = db()->prepare("UPDATE forum_topics SET view_count = view_count + 1 WHERE id = ?");
    $stmt->execute([$id]);
}
