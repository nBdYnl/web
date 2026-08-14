<?php
/**
 * nBdy — Article Detail Page
 */
require_once __DIR__ . '/../includes/header.php';

$slug = $_GET['slug'] ?? '';
$story = getStoryBySlug($slug);

if (!$story) {
    http_response_code(404);
    $pageTitle = 'Niet gevonden';
    echo '<div style="padding:200px 48px;text-align:center;"><h1>Verhaal niet gevonden</h1><p><a href="' . SITE_URL . '">Terug naar home</a></p></div>';
    require_once __DIR__ . '/../includes/footer.php';
    exit;
}

$pageTitle = $story['title'];
$pageDesc = $story['excerpt'];
incrementStoryViews($story['id']);

$lang = getCurrentLang();
$catName = $story['name_' . $lang] ?? $story['name_nl'] ?? 'Algemeen';
?>

<style>
.article-page { max-width: 720px; margin: 0 auto; padding: 140px 24px 80px; }
.article-page .article-meta { font-size: 12px; color: var(--text-faint); letter-spacing: 2px; text-transform: uppercase; margin-bottom: 16px; }
.article-page .article-meta span { color: var(--gold); }
.article-page h1 { font-family: var(--font-sans); font-size: 42px; font-weight: 600; color: var(--text-primary); line-height: 1.15; margin-bottom: 24px; letter-spacing: -0.5px; }
.article-page .article-image { width: 100%; height: 400px; border-radius: 16px; overflow: hidden; margin-bottom: 40px; }
.article-page .article-image img { width: 100%; height: 100%; object-fit: cover; }
.article-page .article-content { font-size: 17px; line-height: 1.8; color: var(--text-secondary); }
.article-page .article-content p { margin-bottom: 1.5em; }
.article-page .article-footer { margin-top: 60px; padding-top: 32px; border-top: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; }
.article-page .back-link { color: var(--gold); text-decoration: none; font-size: 14px; font-weight: 500; }
.article-page .back-link:hover { text-decoration: underline; }
@media(max-width:768px) { .article-page h1 { font-size: 28px; } .article-page .article-image { height: 240px; } }
</style>

<div class="article-page">
  <div class="article-meta"><span><?= sanitizeInput($catName) ?></span> · <?= formatDate($story['published_at']) ?> · <?= sanitizeInput($story['read_time']) ?></div>
  <h1><?= sanitizeInput($story['title']) ?></h1>
  <div class="article-image">
    <img src="<?= sanitizeInput($story['featured_image']) ?>" alt="">
  </div>
  <div class="article-content">
    <?= $story['content'] ?>
  </div>
  <div class="article-footer">
    <a href="<?= SITE_URL ?>/" class="back-link">← <?= t('nav_stroom') ?></a>
    <span style="font-size:13px;color:var(--text-faint);"><?= $story['view_count'] + 1 ?> views</span>
  </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
