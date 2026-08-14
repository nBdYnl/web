<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/functions.php';

$lang = getCurrentLang();
$theme = getCurrentTheme();
$user = getCurrentUser();
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>" class="<?= $theme === 'dark' ? 'dark' : '' ?>">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= isset($pageTitle) ? sanitizeInput($pageTitle) . ' — ' : '' ?>nBdy</title>
<meta name="description" content="<?= isset($pageDesc) ? sanitizeInput($pageDesc) : 'nBdy — Voor en van iedereen. Alles is verbonden.' ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= ASSETS_URL ?>/css/style.css">
<?php if (isset($extraCss)): foreach ((array)$extraCss as $css): ?>
<link rel="stylesheet" href="<?= ASSETS_URL ?>/css/<?= $css ?>">
<?php endforeach; endif; ?>
</head>
<body>

<!-- Toast -->
<div id="toast"></div>

<!-- Login Modal -->
<?php require_once __DIR__ . '/sections/login-modal.php'; ?>

<!-- Navigation -->
<nav id="main-nav">
  <div class="nav-inner">
    <a href="<?= SITE_URL ?>/" class="nav-brand" onclick="window.scrollTo({top:0,behavior:'smooth'});return false;">
      <div class="logo-ring"><span>n</span></div>
      <div><div class="brand-text">nBdy</div><div class="brand-sub">Voor en van iedereen</div></div>
    </a>
    <div class="nav-links">
      <a href="#stroom" data-t="nav_stroom">De Stroom</a>
      <a href="#forum" data-t="nav_forum">Het Forum</a>
      <a href="#plek" data-t="nav_plek">De Plek</a>
      <a href="#over" data-t="nav_over">Over nBdy</a>
    </div>
    <div class="nav-tools">
      <div class="lang-wrap">
        <button class="nav-btn" onclick="toggleLangDropdown()" id="lang-toggle" title="Taal">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </button>
        <div id="lang-dropdown">
          <button onclick="setLang('nl')" id="lang-nl" class="active">🇳🇱 <span data-t="lang_nl">Nederlands</span></button>
          <button onclick="setLang('en')" id="lang-en">🇬🇧 <span data-t="lang_en">English</span></button>
          <button onclick="setLang('de')" id="lang-de">🇩🇪 <span data-t="lang_de">Deutsch</span></button>
        </div>
      </div>
      <button class="nav-btn" onclick="toggleTheme()" title="Thema" id="theme-btn" style="position:relative;width:36px;height:36px;">
        <span id="theme-icon" style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;transition:opacity .3s,transform .3s;">
          <svg id="icon-sun" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:20px;height:20px;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
        </span>
      </button>
      <div id="auth-buttons">
        <button class="nav-btn" onclick="openLoginModal()" title="Login">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
        </button>
      </div>
      <div id="user-menu">
        <button class="write-btn" onclick="alert(t('toast_write_soon'))">
          <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
          <span data-t="nav_write">Verhaal</span>
        </button>
        <button class="user-avatar" id="nav-avatar" onclick="handleLogout()" title="Uitloggen">G</button>
      </div>
      <button class="nav-btn mobile-toggle" onclick="toggleMobile()">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16"/></svg>
      </button>
    </div>
  </div>
</nav>

<div id="mobile-menu">
  <button class="close-mobile" onclick="toggleMobile()"><svg width="32" height="32" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"/></svg></button>
  <a href="#stroom" onclick="toggleMobile()" data-t="nav_stroom">De Stroom</a>
  <a href="#forum" onclick="toggleMobile()" data-t="nav_forum">Het Forum</a>
  <a href="#plek" onclick="toggleMobile()" data-t="nav_plek">De Plek</a>
  <a href="#over" onclick="toggleMobile()" data-t="nav_over">Over nBdy</a>
</div>

<div id="login-modal">
  <div class="login-box">
    <button class="close-login" onclick="closeLoginModal()"><svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button>
    <h2>nBdy</h2>
    <p class="login-sub" data-t="login_welcome">Welkom terug, ziel.</p>
    <form onsubmit="handleLogin(event)">
      <label>Email</label>
      <input type="email" id="login-email" placeholder="jouw@email.nl" required>
      <label data-t="password">Wachtwoord</label>
      <input type="password" id="login-password" placeholder="••••••••" required>
      <button type="submit" data-t="login_btn">Inloggen</button>
    </form>
  </div>
</div>

<main>
