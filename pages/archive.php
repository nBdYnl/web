<?php
/**
 * nBdy — Archive / All Stories
 */
require_once __DIR__ . '/../includes/header.php';

$pageTitle = t('stroom_title');

$category = $_GET['cat'] ?? null;
$params = [];
$sql = "SELECT s.*, c.name_nl, c.name_en, c.name_de, c.color, c.slug as cat_slug FROM stories s LEFT JOIN categories c ON s.category_id = c.id WHERE s.status = 'published'";
if ($category) {
    $sql .= " AND c.slug = ?";
    $params[] = $category;
}
$sql .= " ORDER BY s.published_at DESC";

$stmt = db()->prepare($sql);
$stmt->execute($params);
$stories = $stmt->fetchAll();

$lang = getCurrentLang();
$categories = getCategories();
?>

<style>
.archive-page { max-width: 1200px; margin: 0 auto; padding: 140px 48px 80px; }
.archive-page h1 { font-family: var(--font-sans); font-size: 42px; font-weight: 600; color: var(--text-primary); margin-bottom: 32px; letter-spacing: -0.5px; }
.archive-filters { display: flex; gap: 12px; margin-bottom: 40px; flex-wrap: wrap; }
.archive-filters a { padding: 8px 20px; border-radius: 999px; font-size: 13px; text-decoration: none; border: 1px solid var(--border); color: var(--text-dim); transition: all .2s; }
.archive-filters a:hover, .archive-filters a.active { background: var(--gold); color: #fff; border-color: var(--gold); }
.archive-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 36px; }
@media(max-width:1024px) { .archive-grid { grid-template-columns: repeat(2, 1fr); } }
@media(max-width:768px) { .archive-page { padding: 120px 24px 60px; } .archive-page h1 { font-size: 28px; } .archive-grid { grid-template-columns: 1fr; } }
</style>

<div class="archive-page">
  <h1><?= t('stroom_title') ?></h1>

  <div class="archive-filters">
    <a href="?" class="<?= !$category ? 'active' : '' ?>">Alles</a>
    <?php foreach ($categories as $cat): ?>
    <a href="?cat=<?= $cat['slug'] ?>" class="<?= $category === $cat['slug'] ? 'active' : '' ?>"><?= sanitizeInput($cat['name_' . $lang] ?? $cat['name_nl']) ?></a>
    <?php endforeach; ?>
  </div>

  <div class="archive-grid">
    <?php foreach ($stories as $story): ?>
    <article class="card-sm" onclick="location.href='<?= storyUrl($story['slug']) ?>'">
      <div class="sm-img">
        <img src="<?= sanitizeInput($story['featured_image']) ?>" alt="">
      </div>
      <div class="sm-tag"><?= sanitizeInput($story['name_' . $lang] ?? $story['name_nl'] ?? 'Algemeen') ?></div>
      <h4><?= sanitizeInput($story['title']) ?></h4>
      <p><?= sanitizeInput(excerpt($story['excerpt'], 100)) ?></p>
    </article>
    <?php endforeach; ?>
  </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
