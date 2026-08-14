<?php
/**
 * nBdy — Contact Page
 */
require_once __DIR__ . '/../includes/header.php';
$pageTitle = t('footer_contact');
?>

<style>
.contact-page { max-width: 600px; margin: 0 auto; padding: 140px 48px 80px; text-align: center; }
.contact-page h1 { font-family: var(--font-sans); font-size: 42px; font-weight: 600; color: var(--text-primary); margin-bottom: 16px; }
.contact-page p { color: var(--text-dim); margin-bottom: 40px; }
.contact-page .contact-email { font-size: 24px; color: var(--gold); text-decoration: none; font-weight: 500; }
.contact-page .contact-email:hover { text-decoration: underline; }
</style>

<div class="contact-page">
  <h1><?= t('footer_contact') ?></h1>
  <p>Heb je een vraag, idee, of wil je gewoon hallo zeggen?<br>We horen graag van je.</p>
  <a href="mailto:<?= SITE_EMAIL ?>" class="contact-email"><?= SITE_EMAIL ?></a>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
