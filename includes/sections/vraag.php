<?php
$lang = getCurrentLang();
$ex = getActiveExercise();
$label = $ex['label_' . $lang] ?? $ex['label_nl'] ?? 'De vraag';
$quote = $ex['quote_' . $lang] ?? $ex['quote_nl'] ?? '';
$desc = $ex['description_' . $lang] ?? $ex['description_nl'] ?? '';
$cta = $ex['cta_' . $lang] ?? $ex['cta_nl'] ?? 'Deel je ervaring in het forum';
?>
<section class="oefening" id="vraag">
  <div class="oefening-inner">
    <div class="oefening-label" data-t="vraag_label">De vraag</div>
    <?php if ($quote): ?>
    <blockquote><?= sanitizeInput($quote) ?></blockquote>
    <?php else: ?>
    <blockquote data-t="vraag_quote">"Wie ben jij wanneer je niets hoeft te presteren — zelfs niet voor jezelf?"</blockquote>
    <?php endif; ?>

    <?php if ($desc): ?>
    <p><?= sanitizeInput($desc) ?></p>
    <?php else: ?>
    <p data-t="vraag_desc">Deze week nodigen we je uit om vijf minuten per dag in stilte te zitten. Niet om iets te bereiken, niet om te mediteren 'zoals het hoort'. Gewoon om te zijn. Merk op wat opkomt zonder het te veroordelen. Dat is waar groei begint: in het ruimte maken voor wat er al is.</p>
    <?php endif; ?>

    <a href="<?= SITE_URL ?>/praat-mee" class="btn btn-ghost" data-t="vraag_cta"><?= sanitizeInput($cta) ?></a>
  </div>
</section>
