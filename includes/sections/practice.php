<?php
$lang = getCurrentLang();
$exercise = getActiveExercise();

// Als er geen oefening in DB staat, gebruik de originele fallback teksten
$label = $exercise['label_' . $lang] ?? null;
$quote = $exercise['quote_' . $lang] ?? null;
$desc  = $exercise['description_' . $lang] ?? null;
$cta   = $exercise['cta_' . $lang] ?? null;

// Als DB leeg is, laat data-t attributen de JS vertaling doen
$hasDbData = $label !== null;
?>
<section class="oefening">
  <div class="oefening-inner">
    <div class="label" <?= !$hasDbData ? 'data-t="oefening_label"' : '' ?>><?= $hasDbData ? sanitizeInput($label) : 'De oefening' ?></div>
    <blockquote <?= !$hasDbData ? 'data-t="oefening_quote"' : '' ?>><?= $hasDbData ? sanitizeInput($quote) : '"Deze week: vijf minuten stilzitten. Geen doel, geen prestatie. Gewoon even niets."' ?></blockquote>
    <p <?= !$hasDbData ? 'data-t="oefening_desc"' : '' ?>><?= $hasDbData ? nl2br(sanitizeInput($desc)) : "Deze week nodigen we je uit om vijf minuten per dag in stilte te zitten. Niet om iets te bereiken, niet om te mediteren 'zoals het hoort'. Gewoon om te zijn. Merk op wat opkomt zonder het te veroordelen. Je hoeft niets te veranderen. Soms is stilte genoeg." ?></p>
    <a href="#forum" class="btn btn-ghost" <?= !$hasDbData ? 'data-t="oefening_cta"' : '' ?>><?= $hasDbData ? sanitizeInput($cta) : 'Deel je ervaring in het forum' ?></a>
  </div>
</section>
