<?php
$lang = getCurrentLang();
$topics = getForumTopics(3);
function topicCatName($topic, $lang) { return $topic['name_' . $lang] ?? $topic['name_nl'] ?? 'Algemeen'; }
?>
<div class="forum-strip" id="praat-mee">
  <div class="fs-head">
    <h2 data-t="praat_title">Praat mee</h2>
    <a href="<?= SITE_URL ?>/praat-mee" data-t="praat_all">Bekijk alles →</a>
  </div>
  <div class="forum-grid">
    <?php foreach ($topics as $topic): ?>
    <div class="f-card" onclick="location.href='<?= forumUrl($topic['slug']) ?>'">
      <div class="f-tag"><?= sanitizeInput(topicCatName($topic, $lang)) ?></div>
      <h4><?= sanitizeInput($topic['title']) ?></h4>
      <p><?= sanitizeInput(excerpt($topic['content'], 120)) ?></p>
      <div class="f-meta">
        <span><?= $topic['reply_count'] ?> <?= $topic['reply_count'] == 1 ? 'reactie' : 'reacties' ?></span>
        <span><?= timeAgo($topic['last_reply_at'] ?? $topic['created_at']) ?></span>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>
