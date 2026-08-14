<?php
/**
 * nBdy — Forum Overview Page
 */
require_once __DIR__ . '/../includes/header.php';

$pageTitle = t('forum_title');
$topics = getForumTopics(20);
$lang = getCurrentLang();
?>

<style>
.forum-overview { max-width: 900px; margin: 0 auto; padding: 140px 48px 80px; }
.forum-overview h1 { font-family: var(--font-sans); font-size: 42px; font-weight: 600; color: var(--text-primary); margin-bottom: 40px; letter-spacing: -0.5px; }
.forum-overview .topic-row { display: flex; align-items: center; gap: 20px; padding: 24px 0; border-bottom: 1px solid var(--border); cursor: pointer; transition: padding-left .2s; }
.forum-overview .topic-row:hover { padding-left: 8px; }
.forum-overview .topic-tag { font-size: 11px; color: var(--gold); letter-spacing: 1.5px; text-transform: uppercase; font-weight: 500; min-width: 100px; }
.forum-overview .topic-info { flex: 1; }
.forum-overview .topic-info h4 { font-size: 18px; font-weight: 500; color: var(--text-primary); margin-bottom: 6px; }
.forum-overview .topic-info p { font-size: 14px; color: var(--text-dim); }
.forum-overview .topic-meta { font-size: 12px; color: var(--text-faint); text-align: right; min-width: 120px; }
@media(max-width:768px) { .forum-overview { padding: 120px 24px 60px; } .forum-overview h1 { font-size: 28px; } .forum-overview .topic-row { flex-direction: column; align-items: flex-start; gap: 8px; } .forum-overview .topic-meta { text-align: left; } }
</style>

<div class="forum-overview">
  <h1><?= t('forum_title') ?></h1>

  <?php foreach ($topics as $topic): 
    $catName = $topic['name_' . $lang] ?? $topic['name_nl'] ?? 'Algemeen';
  ?>
  <div class="topic-row" onclick="location.href='<?= forumUrl($topic['slug']) ?>'">
    <div class="topic-tag"><?= sanitizeInput($catName) ?></div>
    <div class="topic-info">
      <h4><?= sanitizeInput($topic['title']) ?></h4>
      <p><?= sanitizeInput(excerpt($topic['content'], 80)) ?></p>
    </div>
    <div class="topic-meta">
      <?= $topic['reply_count'] ?> <?= $topic['reply_count'] === 1 ? t('forum_reply') : t('forum_replies') ?><br>
      <?= timeAgo($topic['last_reply_at'] ?? $topic['created_at']) ?>
    </div>
  </div>
  <?php endforeach; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
