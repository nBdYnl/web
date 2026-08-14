<?php
$lang = getCurrentLang();
$testimonials = getTestimonials();
?>
<section class="stemmen">
  <div class="stemmen-inner">
    <div class="stemmen-head">
      <h2 data-t="stemmen_title">Stemmen uit de stroom</h2>
      <a href="#" data-t="stemmen_all">Alle stemmen →</a>
    </div>
    <div class="stemmen-grid">
      <?php foreach ($testimonials as $t):
        $quote = $t['quote_' . $lang] ?? $t['quote_nl'];
        $role  = $t['author_role'];
      ?>
      <div class="stem-card">
        <blockquote><?= sanitizeInput($quote) ?></blockquote>
        <div class="stem-author">
          <div class="stem-av"><?= htmlspecialchars($t['author_init'] ?? '?') ?></div>
          <div>
            <div class="stem-name"><?= sanitizeInput($t['author_name']) ?></div>
            <div class="stem-role"><?= sanitizeInput($role) ?></div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
