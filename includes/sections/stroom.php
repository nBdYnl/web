<?php
$lang = getCurrentLang();
$featured = getFeaturedStory();
$recent = getRecentStories(3, $featured['id'] ?? 0);
$readMore = getRecentStories(3, 0);
function catName($story, $lang) { return $story['name_' . $lang] ?? $story['name_nl'] ?? 'Algemeen'; }
?>
<div class="mag">
  <div class="section-head" id="stroom">
    <h2 data-t="stroom_title">De Stroom</h2>
    <a href="<?= SITE_URL ?>/pages/archive.php" data-t="stroom_all">Alles bekijken →</a>
  </div>
  <div class="edit-grid">
    <?php if ($featured): ?>
    <article class="card-lg" onclick="location.href='<?= storyUrl($featured['slug']) ?>'">
      <div class="card-img"><img src="<?= sanitizeInput($featured['featured_image']) ?>" alt=""></div>
      <div class="card-body">
        <div class="card-tag"><?= sanitizeInput(catName($featured, $lang)) ?></div>
        <h3><?= sanitizeInput($featured['title']) ?></h3>
        <p><?= sanitizeInput($featured['excerpt']) ?></p>
      </div>
    </article>
    <?php endif; ?>
    <div class="card-col">
      <?php foreach ($recent as $story): ?>
      <article class="card-md" onclick="location.href='<?= storyUrl($story['slug']) ?>'">
        <div class="md-img"><img src="<?= sanitizeInput($story['featured_image']) ?>" alt=""></div>
        <div class="md-body">
          <div class="md-tag"><?= sanitizeInput(catName($story, $lang)) ?></div>
          <h4><?= sanitizeInput($story['title']) ?></h4>
          <p><?= sanitizeInput(excerpt($story['excerpt'], 80)) ?></p>
          <div class="md-meta"><?= formatDate($story['published_at']) ?> · <?= sanitizeInput($story['read_time']) ?></div>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </div>

  <?php require_once __DIR__ . '/oefening.php'; ?>

  <div class="section-head">
    <h2 data-t="verder_title">Verder lezen</h2>
    <a href="<?= SITE_URL ?>/pages/archive.php" data-t="verder_archief">Archief →</a>
  </div>
  <div class="grid-3">
    <?php foreach ($readMore as $story): ?>
    <article class="card-sm" onclick="location.href='<?= storyUrl($story['slug']) ?>'">
      <div class="sm-img"><img src="<?= sanitizeInput($story['featured_image']) ?>" alt=""></div>
      <div class="sm-tag"><?= sanitizeInput(catName($story, $lang)) ?></div>
      <h4><?= sanitizeInput($story['title']) ?></h4>
      <p><?= sanitizeInput(excerpt($story['excerpt'], 100)) ?></p>
    </article>
    <?php endforeach; ?>
  </div>
</div>
