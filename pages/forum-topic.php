<?php
/**
 * nBdy — Forum Topic Detail Page
 */
require_once __DIR__ . '/../includes/header.php';

$slug = $_GET['slug'] ?? '';
$topic = getForumTopicBySlug($slug);

if (!$topic) {
    http_response_code(404);
    echo '<div style="padding:200px 48px;text-align:center;"><h1>Onderwerp niet gevonden</h1><p><a href="' . SITE_URL . '">Terug naar home</a></p></div>';
    require_once __DIR__ . '/../includes/footer.php';
    exit;
}

$pageTitle = $topic['title'];
incrementForumViews($topic['id']);

$lang = getCurrentLang();
$catName = $topic['name_' . $lang] ?? $topic['name_nl'] ?? 'Algemeen';
$replies = getForumReplies($topic['id']);
?>

<style>
.forum-page { max-width: 800px; margin: 0 auto; padding: 140px 24px 80px; }
.forum-page .topic-header { margin-bottom: 40px; }
.forum-page .topic-tag { font-size: 11px; color: var(--gold); letter-spacing: 2px; text-transform: uppercase; margin-bottom: 12px; font-weight: 500; }
.forum-page h1 { font-family: var(--font-sans); font-size: 36px; font-weight: 600; color: var(--text-primary); line-height: 1.2; margin-bottom: 16px; }
.forum-page .topic-meta { font-size: 13px; color: var(--text-faint); }
.forum-page .topic-content { font-size: 16px; line-height: 1.7; color: var(--text-secondary); margin-bottom: 48px; padding: 32px; background: var(--surface); border-radius: 16px; border: 1px solid var(--border); }
.forum-page .replies-title { font-size: 20px; font-weight: 600; color: var(--text-primary); margin-bottom: 24px; }
.forum-page .reply { display: flex; gap: 16px; padding: 24px 0; border-bottom: 1px solid var(--border); }
.forum-page .reply-av { width: 40px; height: 40px; border-radius: 50%; background: var(--bg); border: 1px solid var(--border-light); display: flex; align-items: center; justify-content: center; font-size: 14px; font-weight: 600; color: var(--gold); flex-shrink: 0; }
.forum-page .reply-body { flex: 1; }
.forum-page .reply-name { font-size: 14px; font-weight: 600; color: var(--text-primary); margin-bottom: 4px; }
.forum-page .reply-time { font-size: 12px; color: var(--text-faint); margin-bottom: 8px; }
.forum-page .reply-text { font-size: 15px; line-height: 1.6; color: var(--text-secondary); }
.forum-page .reply-form { margin-top: 40px; padding: 32px; background: var(--surface); border-radius: 16px; border: 1px solid var(--border); }
.forum-page .reply-form textarea { width: 100%; min-height: 120px; padding: 16px; border-radius: 12px; border: 1px solid var(--border); background: var(--input-bg); color: var(--text-primary); font-family: var(--font-sans); font-size: 15px; resize: vertical; margin-bottom: 16px; }
.forum-page .reply-form button { padding: 12px 28px; border-radius: 999px; border: none; background: var(--gold); color: #fff; font-family: var(--font-sans); font-size: 13px; font-weight: 600; cursor: pointer; transition: opacity .2s; }
.forum-page .reply-form button:hover { opacity: 0.9; }
@media(max-width:768px) { .forum-page h1 { font-size: 26px; } }
</style>

<div class="forum-page">
  <div class="topic-header">
    <div class="topic-tag"><?= sanitizeInput($catName) ?></div>
    <h1><?= sanitizeInput($topic['title']) ?></h1>
    <div class="topic-meta">
      <?= sanitizeInput($topic['author_name'] ?? 'Anoniem') ?> · <?= timeAgo($topic['created_at']) ?> · <?= $topic['view_count'] + 1 ?> views
    </div>
  </div>

  <div class="topic-content">
    <?= nl2br(sanitizeInput($topic['content'])) ?>
  </div>

  <div class="replies-title"><?= count($replies) ?> <?= count($replies) === 1 ? t('forum_reply') : t('forum_replies') ?></div>

  <?php foreach ($replies as $reply): ?>
  <div class="reply">
    <div class="reply-av"><?= htmlspecialchars($reply['avatar_init'] ?? '?') ?></div>
    <div class="reply-body">
      <div class="reply-name"><?= sanitizeInput($reply['author_name'] ?? 'Anoniem') ?></div>
      <div class="reply-time"><?= timeAgo($reply['created_at']) ?></div>
      <div class="reply-text"><?= nl2br(sanitizeInput($reply['content'])) ?></div>
    </div>
  </div>
  <?php endforeach; ?>

  <?php if (isLoggedIn()): ?>
  <div class="reply-form">
    <form method="POST" action="<?= SITE_URL ?>/api/post-reply.php">
      <?= csrfInput() ?>
      <input type="hidden" name="topic_id" value="<?= $topic['id'] ?>">
      <textarea name="content" placeholder="Jouw reactie..." required></textarea>
      <button type="submit"><?= t('reply') ?></button>
    </form>
  </div>
  <?php else: ?>
  <div style="text-align:center;padding:32px;background:var(--surface);border-radius:16px;border:1px solid var(--border);margin-top:24px;">
    <p style="margin-bottom:16px;">Log in om te reageren.</p>
    <button class="btn btn-gold" onclick="openLoginModal()"><?= t('nav_login') ?></button>
  </div>
  <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
