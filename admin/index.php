<?php
/**
 * nBdy Admin — Dashboard
 */
require_once __DIR__ . '/../includes/header.php';
requireAdmin();

$pageTitle = 'Admin Dashboard';

// Stats
$stats = [
    'users' => db()->query("SELECT COUNT(*) FROM users")->fetchColumn(),
    'stories' => db()->query("SELECT COUNT(*) FROM stories")->fetchColumn(),
    'forum_topics' => db()->query("SELECT COUNT(*) FROM forum_topics")->fetchColumn(),
    'forum_replies' => db()->query("SELECT COUNT(*) FROM forum_replies")->fetchColumn(),
];
?>

<style>
.admin-page { max-width: 1200px; margin: 0 auto; padding: 140px 48px 80px; }
.admin-page h1 { font-size: 36px; font-weight: 600; color: var(--text-primary); margin-bottom: 40px; }
.admin-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px; margin-bottom: 48px; }
.admin-card { background: var(--surface); border: 1px solid var(--border); border-radius: 16px; padding: 32px; text-align: center; }
.admin-card .num { font-size: 36px; font-weight: 600; color: var(--gold); margin-bottom: 8px; }
.admin-card .lbl { font-size: 12px; color: var(--text-faint); letter-spacing: 2px; text-transform: uppercase; }
.admin-section { background: var(--surface); border: 1px solid var(--border); border-radius: 16px; padding: 32px; margin-bottom: 24px; }
.admin-section h2 { font-size: 20px; font-weight: 600; color: var(--text-primary); margin-bottom: 20px; }
.admin-table { width: 100%; border-collapse: collapse; }
.admin-table th { text-align: left; padding: 12px; font-size: 11px; color: var(--text-faint); letter-spacing: 1px; text-transform: uppercase; border-bottom: 1px solid var(--border); }
.admin-table td { padding: 12px; font-size: 14px; color: var(--text-secondary); border-bottom: 1px solid var(--border); }
.admin-table tr:hover td { background: var(--surface-hover); }
@media(max-width:768px) { .admin-grid { grid-template-columns: repeat(2, 1fr); } }
</style>

<div class="admin-page">
  <h1>Admin Dashboard</h1>

  <div class="admin-grid">
    <div class="admin-card">
      <div class="num"><?= $stats['users'] ?></div>
      <div class="lbl">Gebruikers</div>
    </div>
    <div class="admin-card">
      <div class="num"><?= $stats['stories'] ?></div>
      <div class="lbl">Verhalen</div>
    </div>
    <div class="admin-card">
      <div class="num"><?= $stats['forum_topics'] ?></div>
      <div class="lbl">Forum topics</div>
    </div>
    <div class="admin-card">
      <div class="num"><?= $stats['forum_replies'] ?></div>
      <div class="lbl">Reacties</div>
    </div>
  </div>

  <div class="admin-section">
    <h2>Laatste verhalen</h2>
    <table class="admin-table">
      <thead>
        <tr><th>Titel</th><th>Status</th><th>Datum</th><th>Views</th></tr>
      </thead>
      <tbody>
        <?php foreach (getRecentStories(5) as $s): ?>
        <tr>
          <td><a href="<?= storyUrl($s['slug']) ?>" style="color:var(--gold);text-decoration:none;"><?= sanitizeInput($s['title']) ?></a></td>
          <td><?= $s['status'] ?></td>
          <td><?= formatDate($s['published_at']) ?></td>
          <td><?= $s['view_count'] ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <div class="admin-section">
    <h2>Laatste forum topics</h2>
    <table class="admin-table">
      <thead>
        <tr><th>Titel</th><th>Reacties</th><th>Datum</th></tr>
      </thead>
      <tbody>
        <?php foreach (getForumTopics(5) as $t): ?>
        <tr>
          <td><a href="<?= forumUrl($t['slug']) ?>" style="color:var(--gold);text-decoration:none;"><?= sanitizeInput($t['title']) ?></a></td>
          <td><?= $t['reply_count'] ?></td>
          <td><?= timeAgo($t['created_at']) ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
