<?php
$lang = getCurrentLang();
$title = getSiteSetting('plek_title_' . $lang);
$desc1 = getSiteSetting('plek_desc1_' . $lang);
$desc2 = getSiteSetting('plek_desc2_' . $lang);
$caption = getSiteSetting('plek_caption_' . $lang);
$hasDbData = $title !== null;
?>
<section class="plek" id="place">
  <div class="plek-grid">
    <div class="plek-text">
      <div class="label" <?= !$hasDbData ? 'data-t="plek_label"' : '' ?>><?= $hasDbData ? sanitizeInput($title) : 'Ons plan' ?></div>
      <h2 <?= !$hasDbData ? 'data-t="plek_title"' : '' ?>><?= $hasDbData ? sanitizeInput($title) : 'De Plek' ?></h2>
      <p <?= !$hasDbData ? 'data-t="plek_desc1"' : '' ?>><?= $hasDbData ? sanitizeInput($desc1) : "Een blokhut, verscholen tussen de bomen. Dichtbij water — een stil meer, een kabbelend beekje. 's Avonds een kampvuur dat knettert terwijl de sterren tevoorschijn komen." ?></p>
      <p <?= !$hasDbData ? 'data-t="plek_desc2"' : '' ?>><?= $hasDbData ? sanitizeInput($desc2) : 'Geen therapie, geen programma. Gewoon zijn. Samen rond het vuur. Praten als je wilt, zwijgen als je moet. Een plek waar je kunt uitrusten, praten en ontmoeten. Dat is waar we naartoe werken.' ?></p>
      <div class="plek-stats">
        <div class="plek-stat"><div class="num">0</div><div class="lbl" data-t="plek_hectare">Hectare</div></div>
        <div class="plek-stat"><div class="num">247</div><div class="lbl" data-t="plek_zielen">Zielen</div></div>
        <div class="plek-stat"><div class="num">1</div><div class="lbl" data-t="plek_droom">Droom</div></div>
      </div>
    </div>
    <div class="plek-visual">
      <img src="https://kimi-web-img.moonshot.cn/img/images.stockcake.com/d75365e603f1f1b84cca01699dc51beecd34b442.jpg" alt="">
      <div class="pv-caption"><span <?= !$hasDbData ? 'data-t="plek_caption"' : '' ?>><?= $hasDbData ? sanitizeInput($caption) : 'De droom — een kampvuur, water, en de stilte van het bos' ?></span></div>
    </div>
  </div>
</section>
