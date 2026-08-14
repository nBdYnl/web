<?php
/**
 * nBdy — User Profile Page
 */
require_once __DIR__ . '/../includes/header.php';
requireLogin();

$user = getCurrentUser();
$pageTitle = $user['display_name'];
?>

<style>
.profile-page { max-width: 600px; margin: 0 auto; padding: 140px 48px 80px; }
.profile-page .profile-header { display: flex; align-items: center; gap: 24px; margin-bottom: 48px; }
.profile-page .profile-avatar { width: 80px; height: 80px; border-radius: 50%; background: linear-gradient(135deg, var(--gold), #5C4A3A); color: #fff; display: flex; align-items: center; justify-content: center; font-size: 32px; font-weight: 600; }
.profile-page .profile-info h1 { font-size: 28px; font-weight: 600; color: var(--text-primary); margin-bottom: 4px; }
.profile-page .profile-info p { color: var(--text-faint); font-size: 14px; }
.profile-page .profile-section { margin-bottom: 32px; }
.profile-page .profile-section h3 { font-size: 14px; color: var(--text-faint); letter-spacing: 2px; text-transform: uppercase; margin-bottom: 16px; }
.profile-page .profile-stat { display: flex; justify-content: space-between; padding: 16px 0; border-bottom: 1px solid var(--border); }
.profile-page .profile-stat span:first-child { color: var(--text-dim); }
.profile-page .profile-stat span:last-child { color: var(--text-primary); font-weight: 500; }
</style>

<div class="profile-page">
  <div class="profile-header">
    <div class="profile-avatar"><?= htmlspecialchars($user['avatar_init'] ?? strtoupper(substr($user['display_name'], 0, 1))) ?></div>
    <div class="profile-info">
      <h1><?= sanitizeInput($user['display_name']) ?></h1>
      <p><?= sanitizeInput($user['email']) ?> · <?= $user['role'] ?></p>
    </div>
  </div>

  <div class="profile-section">
    <h3>Instellingen</h3>
    <div class="profile-stat">
      <span>Taal</span>
      <span><?= $GLOBALS['LANGUAGES'][$user['lang_preference'] ?? 'nl']['name'] ?? 'Nederlands' ?></span>
    </div>
    <div class="profile-stat">
      <span>Thema</span>
      <span><?= ucfirst($user['theme_preference'] ?? 'auto') ?></span>
    </div>
  </div>

  <div class="profile-section">
    <h3>Account</h3>
    <div class="profile-stat">
      <span>Lid sinds</span>
      <span><?= formatDate($user['joined_at'] ?? '2026-01-01') ?></span>
    </div>
  </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
