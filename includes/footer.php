<?php
$lang = getCurrentLang();
?>
</main>

<footer class="footer" id="about">
  <div class="footer-stamp">nBdy — Voor en van iedereen</div>
  <p data-t="footer_desc">Gedeelde verhalen. Echte gesprekken.</p>
  <div class="footer-links">
    <a href="#stories" data-t="footer_verhalen">Verhalen</a>
    <a href="#" data-t="footer_videos">Video's</a>
    <a href="#" data-t="footer_fotos">Foto's</a>
    <a href="#forum" data-t="footer_forum">Het Forum</a>
    <a href="#place" data-t="footer_de_plek">De Plek</a>
    <a href="<?= SITE_URL ?>/pages/contact.php" data-t="footer_contact">Contact</a>
  </div>
  <a href="#" class="join-btn" data-t="footer_cta_btn">Doe mee</a>
</footer>

<script>
// ── Volledig origineel i18n object ─────────────────────────
const i18n = {
  nl: {
    nav_stroom: 'Verhalen', nav_forum: 'Forum', nav_plek: 'De Plek', nav_over: 'Over nBdy',
    nav_write: 'Verhaal', nav_login: 'Inloggen', nav_logout: 'Uitloggen',
    lang_nl: 'Nederlands', lang_en: 'English', lang_de: 'Deutsch',
    hero_label: 'Een collectief van zielen',
    hero_title: 'Alles is <em style="color:var(--gold)">verbonden</em>.<br>Jij bent hier niet toevallig.',
    hero_sub: 'Een plek waar verhalen worden gedeeld, niet gehouden. Waar het donker wordt erkend en het licht wordt gevierd. Samen, niet alleen.',
    hero_cta1: 'Bekijk de verhalen', hero_cta2: 'De Plek',
    web_f: 'Filosofie', web_p: 'Persoonlijk', web_m: 'Maatschappij',
    web_k: 'Kunst', web_n: 'Natuur', web_s: 'Stilte',
    stats_zielen: 'Mensen', stats_verhalen: 'Verhalen', stats_verbindingen: 'Reacties', stats_plek: 'Locatie',
    stroom_title: 'Verhalen', stroom_all: 'Alles bekijken →',
    card_feat_tag: 'Filosofie',
    card_feat_title: 'Wat betekent vrijheid echt?',
    card_feat_desc: 'Wat betekent het om werkelijk vrij te zijn? Niet alleen van ketenen, maar van de ideeën die ons gevangen houden zonder dat we het merken.',
    card_s1_tag: 'Persoonlijk',
    card_s1_title: 'De bladzijden van het leven',
    card_s1_desc: "Sommige pagina's worden gescheurd, verbrand, of vergeten...",
    card_s1_meta: '01.07.2026 · 4 min',
    card_s2_tag: 'Video',
    card_s2_title: 'Soms zegt stilte meer dan woorden',
    card_s2_desc: 'Soms zegt het niets-zeggen meer dan duizend zinnen...',
    card_s2_meta: '05.07.2026 · 4:32',
    card_s3_tag: 'Maatschappij',
    card_s3_title: 'Het Verhaal van Mesopotamia',
    card_s3_desc: 'Wie waren we voordat de geschiedenis ons vertelde wie we moesten zijn?',
    card_s3_meta: '24.06.2026 · 9 min',
    verder_title: 'Verder lezen', verder_archief: 'Archief →',
    card_r1_tag: 'Persoonlijk',
    card_r1_title: 'De reis van het leven',
    card_r1_desc: 'We denken dat we reizen naar een bestemming. Maar het pad zelf is het enige dat telt.',
    card_r2_tag: 'Filosofie',
    card_r2_title: 'Tien over twaalf',
    card_r2_desc: 'Er is een moment waarop de klok stil lijkt te staan. Waarop alles wacht.',
    card_r3_tag: 'Persoonlijk',
    card_r3_title: 'Onverwachts een les over Anorexia',
    card_r3_desc: 'Sommige lessen komen niet uit boeken. Ze komen uit de ogen van iemand die vecht.',
    forum_title: 'Forum', forum_all: 'Bekijk alles →',
    forum_1_tag: 'Praktisch',
    forum_1_title: 'Hoe ga je om met een lastige buur?',
    forum_1_desc: "Ik woon hier nu twee jaar en de buren maken elke avond lawaai tot 2 uur 's nachts. Ik wil geen ruzie, maar mijn rust is op.",
    forum_1_meta: '<span>23 reacties</span><span>2 uur geleden</span>',
    forum_2_tag: 'Persoonlijk',
    forum_2_title: 'Ik durf mijn gevoelens niet te uiten',
    forum_2_desc: 'Mijn hele leven heb ik geleerd om sterk te zijn. Nu merk ik dat ik helemaal niet weet hoe ik moet praten over wat ik voel.',
    forum_2_meta: '<span>47 reacties</span><span>5 uur geleden</span>',
    forum_3_tag: 'Filosofie',
    forum_3_title: 'Wat als vrijheid een illusie is?',
    forum_3_desc: 'We denken dat we keuzes hebben, maar hoeveel van onze beslissingen worden bepaald door wat anderen van ons verwachten?',
    forum_3_meta: '<span>18 reacties</span><span>1 dag geleden</span>',
    plek_label: 'Ons plan', plek_title: 'De Plek',
    plek_desc1: "Een blokhut, verscholen tussen de bomen. Dichtbij water — een stil meer, een kabbelend beekje. 's Avonds een kampvuur dat knettert terwijl de sterren tevoorschijn komen.",
    plek_desc2: 'Geen therapie, geen programma. Gewoon zijn. Samen rond het vuur. Praten als je wilt, zwijgen als je moet. Een plek waar je kunt uitrusten, praten en ontmoeten. Dat is waar we naartoe werken.',
    plek_hectare: 'Hectare', plek_zielen: 'Mensen', plek_droom: 'Doel',
    plek_caption: 'De droom — een kampvuur, water, en de stilte van het bos',
    oefening_label: 'De oefening',
    oefening_quote: '"Deze week: vijf minuten stilzitten. Geen doel, geen prestatie. Gewoon even niets."',
    oefening_desc: "Je hoeft niets te veranderen. Soms is stilte genoeg.",
    oefening_cta: 'Deel je ervaring in het forum',
    stemmen_title: 'Ervaringen', stemmen_all: 'Alle ervaringen →',
    stemmen_1_quote: "Ik had een vraag over mijn buurman. Binnen een uur had ik vijf bruikbare tips. Dat had ik niet verwacht.",
    stemmen_1_name: 'L.', stemmen_1_role: 'Lid sinds maart 2026',
    stemmen_2_quote: 'Hier kan ik gewoon schrijven wat ik denk, zonder dat iemand me raar aankijkt.',
    stemmen_2_name: 'M.', stemmen_2_role: 'Lid sinds januari 2026',
    stemmen_3_quote: 'Ik kwam hier met een vraag over werkstress. De reacties waren eerlijk en praktisch. Precies wat ik nodig had.',
    stemmen_3_name: 'Anoniem', stemmen_3_role: 'Lid sinds juni 2026',
    footer_desc: 'Gedeelde verhalen. Echte gesprekken.',
    footer_verhalen: 'Verhalen', footer_videos: "Video's", footer_fotos: "Foto's", footer_archief: 'Archief',
    footer_forum: 'Forum', footer_de_plek: 'De Plek', footer_verbinding: 'Verbinding', footer_contact: 'Contact',
    footer_cta_text: 'Gedeelde verhalen. Echte gesprekken.', footer_cta_btn: 'Doe mee',
    login_welcome: 'Welkom terug.', password: 'Wachtwoord', login_btn: 'Inloggen',
    toast_welcome: 'Welkom, ', toast_logout: 'Je bent uitgelogd', toast_write_soon: 'Schrijf functionaliteit komt binnenkort'
  },
  en: {
    nav_stroom: 'Stories', nav_forum: 'Forum', nav_plek: 'The Place', nav_over: 'About nBdy',
    nav_write: 'Story', nav_login: 'Sign in', nav_logout: 'Sign out',
    lang_nl: 'Nederlands', lang_en: 'English', lang_de: 'Deutsch',
    hero_label: 'A collective of souls',
    hero_title: 'Everything is <em style="color:var(--gold)">connected</em>.<br>You are not here by chance.',
    hero_sub: 'A place where stories are shared, not kept. Where darkness is acknowledged and light is celebrated. Together, not alone.',
    hero_cta1: 'Browse stories', hero_cta2: 'The Place',
    web_f: 'Philosophy', web_p: 'Personal', web_m: 'Society',
    web_k: 'Art', web_n: 'Nature', web_s: 'Silence',
    stats_zielen: 'People', stats_verhalen: 'Stories', stats_verbindingen: 'Replies', stats_plek: 'Location',
    stroom_title: 'Stories', stroom_all: 'View all →',
    card_feat_tag: 'Philosophy',
    card_feat_title: 'What does freedom really mean?',
    card_feat_desc: 'What does it mean to be truly free? Not just from chains, but from the ideas that hold us captive without us noticing.',
    card_s1_tag: 'Personal',
    card_s1_title: 'The pages of life',
    card_s1_desc: 'Some pages are torn, burned, or forgotten...',
    card_s1_meta: '01.07.2026 · 4 min',
    card_s2_tag: 'Video',
    card_s2_title: 'Sometimes silence says more than words',
    card_s2_desc: 'Sometimes saying nothing says more than a thousand sentences...',
    card_s2_meta: '05.07.2026 · 4:32',
    card_s3_tag: 'Society',
    card_s3_title: 'The Story of Mesopotamia',
    card_s3_desc: 'Who were we before history told us who we had to be?',
    card_s3_meta: '24.06.2026 · 9 min',
    verder_title: 'Further Reading', verder_archief: 'Archive →',
    card_r1_tag: 'Personal',
    card_r1_title: 'The journey of life',
    card_r1_desc: 'We think we travel to a destination. But the path itself is all that matters.',
    card_r2_tag: 'Philosophy',
    card_r2_title: 'Ten past twelve',
    card_r2_desc: 'There is a moment when the clock seems to stand still. When everything waits.',
    card_r3_tag: 'Personal',
    card_r3_title: 'An unexpected lesson about Anorexia',
    card_r3_desc: 'Some lessons do not come from books. They come from the eyes of someone who is fighting.',
    forum_title: 'Forum', forum_all: 'View all →',
    forum_1_tag: 'Practical',
    forum_1_title: 'How do you deal with a difficult neighbor?',
    forum_1_desc: 'I have lived here for two years and the neighbors make noise every evening until 2 AM. I do not want conflict, but my peace is gone.',
    forum_1_meta: '<span>23 replies</span><span>2 hours ago</span>',
    forum_2_tag: 'Personal',
    forum_2_title: 'I dare not express my feelings',
    forum_2_desc: 'My whole life I have learned to be strong. Now I realize I have no idea how to talk about what I feel.',
    forum_2_meta: '<span>47 replies</span><span>5 hours ago</span>',
    forum_3_tag: 'Philosophy',
    forum_3_title: 'What if freedom is an illusion?',
    forum_3_desc: 'We think we have choices, but how many of our decisions are determined by what others expect from us?',
    forum_3_meta: '<span>18 replies</span><span>1 day ago</span>',
    plek_label: 'Our plan', plek_title: 'The Place',
    plek_desc1: 'A cabin, hidden among the trees. Close to water — a silent lake, a babbling brook. In the evening a crackling campfire as the stars appear.',
    plek_desc2: 'No therapy, no program. Just being. Together around the fire. Talk when you want, be silent when you must. A place where you can rest, talk, and meet others. That is what we are working towards.',
    plek_hectare: 'Hectare', plek_zielen: 'People', plek_droom: 'Goal',
    plek_caption: 'The dream — a campfire, water, and the silence of the forest',
    oefening_label: 'The practice',
    oefening_quote: '"This week: five minutes of sitting still. No goal, no performance. Just a moment of nothing."',
    oefening_desc: "You don't have to change anything. Sometimes silence is enough.",
    oefening_cta: 'Share your experience in the forum',
    stemmen_title: 'Experiences', stemmen_all: 'All experiences →',
    stemmen_1_quote: "I had a question about my neighbor. Within an hour I had five useful tips. I didn't expect that.",
    stemmen_1_name: 'L.', stemmen_1_role: 'Member since March 2026',
    stemmen_2_quote: 'Here I can just write what I think, without anyone looking at me strangely.',
    stemmen_2_name: 'M.', stemmen_2_role: 'Member since January 2026',
    stemmen_3_quote: 'I came here with a question about work stress. The responses were honest and practical. Exactly what I needed.',
    stemmen_3_name: 'Anonymous', stemmen_3_role: 'Member since June 2026',
    footer_desc: 'Shared stories. Real conversations.',
    footer_verhalen: 'Stories', footer_videos: 'Videos', footer_fotos: 'Photos', footer_archief: 'Archive',
    footer_forum: 'Forum', footer_de_plek: 'The Place', footer_verbinding: 'Connection', footer_contact: 'Contact',
    footer_cta_text: 'Shared stories. Real conversations.', footer_cta_btn: 'Join us',
    login_welcome: 'Welcome back.', password: 'Password', login_btn: 'Sign in',
    toast_welcome: 'Welcome, ', toast_logout: 'You are signed out', toast_write_soon: 'Writing functionality coming soon'
  },
  de: {
    nav_stroom: 'Geschichten', nav_forum: 'Forum', nav_plek: 'Der Ort', nav_over: 'Über nBdy',
    nav_write: 'Geschichte', nav_login: 'Anmelden', nav_logout: 'Abmelden',
    lang_nl: 'Nederlands', lang_en: 'English', lang_de: 'Deutsch',
    hero_label: 'Ein Kollektiv von Seelen',
    hero_title: 'Alles ist <em style="color:var(--gold)">verbunden</em>.<br>Du bist nicht zufällig hier.',
    hero_sub: 'Ein Ort, an dem Geschichten geteilt werden, nicht gehalten. Wo Dunkelheit anerkannt und Licht gefeiert wird. Zusammen, nicht allein.',
    hero_cta1: 'Geschichten durchsuchen', hero_cta2: 'Der Ort',
    web_f: 'Philosophie', web_p: 'Persönlich', web_m: 'Gesellschaft',
    web_k: 'Kunst', web_n: 'Natur', web_s: 'Stille',
    stats_zielen: 'Menschen', stats_verhalen: 'Geschichten', stats_verbindingen: 'Antworten', stats_plek: 'Standort',
    stroom_title: 'Geschichten', stroom_all: 'Alle ansehen →',
    card_feat_tag: 'Philosophie',
    card_feat_title: 'Was bedeutet Freiheit wirklich?',
    card_feat_desc: 'Was bedeutet es, wirklich frei zu sein? Nicht nur von Ketten, sondern von den Ideen, die uns gefangen halten, ohne dass wir es merken.',
    card_s1_tag: 'Persönlich',
    card_s1_title: 'Die Seiten des Lebens',
    card_s1_desc: 'Manche Seiten werden zerrissen, verbrannt oder vergessen...',
    card_s1_meta: '01.07.2026 · 4 Min',
    card_s2_tag: 'Video',
    card_s2_title: 'Manchmal sagt Stille mehr als Worte',
    card_s2_desc: 'Manchmal sagt das Nichts-Sagen mehr als tausend Sätze...',
    card_s2_meta: '05.07.2026 · 4:32',
    card_s3_tag: 'Gesellschaft',
    card_s3_title: 'Die Geschichte Mesopotamiens',
    card_s3_desc: 'Wer waren wir, bevor die Geschichte uns erzählte, wer wir sein mussten?',
    card_s3_meta: '24.06.2026 · 9 Min',
    verder_title: 'Weiterlesen', verder_archief: 'Archiv →',
    card_r1_tag: 'Persönlich',
    card_r1_title: 'Die Reise des Lebens',
    card_r1_desc: 'Wir denken, wir reisen zu einem Ziel. Aber der Weg selbst ist alles, was zählt.',
    card_r2_tag: 'Philosophie',
    card_r2_title: 'Zehn nach zwölf',
    card_r2_desc: 'Es gibt einen Moment, in dem die Uhr still zu stehen scheint. In dem alles wartet.',
    card_r3_tag: 'Persönlich',
    card_r3_title: 'Eine unerwartete Lektion über Anorexie',
    card_r3_desc: 'Manche Lektionen kommen nicht aus Büchern. Sie kommen aus den Augen von jemandem, der kämpft.',
    forum_title: 'Forum', forum_all: 'Alle ansehen →',
    forum_1_tag: 'Praktisch',
    forum_1_title: 'Wie geht man mit einem schwierigen Nachbarn um?',
    forum_1_desc: 'Ich wohne nun seit zwei Jahren hier und die Nachbarn machen jeden Abend bis 2 Uhr nachts Lärm. Ich will keinen Streit, aber meine Ruhe ist dahin.',
    forum_1_meta: '<span>23 Antworten</span><span>vor 2 Stunden</span>',
    forum_2_tag: 'Persönlich',
    forum_2_title: 'Ich wage nicht, meine Gefühle auszudrücken',
    forum_2_desc: 'Mein ganzes Leben habe ich gelernt, stark zu sein. Jetzt merke ich, dass ich überhaupt nicht weiß, wie ich über das sprechen soll, was ich fühle.',
    forum_2_meta: '<span>47 Antworten</span><span>vor 5 Stunden</span>',
    forum_3_tag: 'Philosophie',
    forum_3_title: 'Was, wenn Freiheit eine Illusion ist?',
    forum_3_desc: 'Wir denken, wir haben Wahlmöglichkeiten, aber wie viele unserer Entscheidungen werden bestimmt von dem, was andere von uns erwarten?',
    forum_3_meta: '<span>18 Antworten</span><span>vor 1 Tag</span>',
    plek_label: 'Unser Plan', plek_title: 'Der Ort',
    plek_desc1: 'Eine Blockhütte, versteckt zwischen den Bäumen. Nah am Wasser — ein stiller See, ein plätschernder Bach. Abends ein knisterndes Lagerfeuer, während die Sterne hervorkommen.',
    plek_desc2: 'Keine Therapie, kein Programm. Einfach sein. Zusammen um das Feuer. Reden wenn du willst, schweigen wenn du musst. Ein Ort, an dem du ausruhen, reden und andere treffen kannst. Darauf arbeiten wir hin.',
    plek_hectare: 'Hektar', plek_zielen: 'Menschen', plek_droom: 'Ziel',
    plek_caption: 'Der Traum — ein Lagerfeuer, Wasser und die Stille des Waldes',
    oefening_label: 'Die Übung',
    oefening_quote: '"Diese Woche: fünf Minuten stillsitzen. Kein Ziel, keine Leistung. Einfach einen Moment nichts."',
    oefening_desc: 'Du musst nichts ändern. Manchmal ist Stille genug.',
    oefening_cta: 'Teile deine Erfahrung im Forum',
    stemmen_title: 'Erfahrungen', stemmen_all: 'Alle Erfahrungen →',
    stemmen_1_quote: 'Ich hatte eine Frage zu meinem Nachbarn. Innerhalb einer Stunde hatte ich fünf nützliche Tipps. Damit hatte ich nicht gerechnet.',
    stemmen_1_name: 'L.', stemmen_1_role: 'Mitglied seit März 2026',
    stemmen_2_quote: 'Hier kann ich einfach aufschreiben, was ich denke, ohne dass mich jemand komisch anschaut.',
    stemmen_2_name: 'M.', stemmen_2_role: 'Mitglied seit Januar 2026',
    stemmen_3_quote: 'Ich kam hierher mit einer Frage zu Arbeitsstress. Die Antworten waren ehrlich und praktisch. Genau was ich brauchte.',
    stemmen_3_name: 'Anonym', stemmen_3_role: 'Mitglied seit Juni 2026',
    footer_desc: 'Geteilte Geschichten. Echte Gespräche.',
    footer_verhalen: 'Geschichten', footer_videos: 'Videos', footer_fotos: 'Fotos', footer_archief: 'Archiv',
    footer_forum: 'Forum', footer_de_plek: 'Der Ort', footer_verbinding: 'Verbindung', footer_contact: 'Kontakt',
    footer_cta_text: 'Geteilte Geschichten. Echte Gespräche.', footer_cta_btn: 'Mach mit',
    login_welcome: 'Willkommen zurück.', password: 'Passwort', login_btn: 'Anmelden',
    toast_welcome: 'Willkommen, ', toast_logout: 'Du hast dich abgemeldet', toast_write_soon: 'Schreibfunktion kommt bald'
  }
};

let currentLang = localStorage.getItem('nbdy_lang') || (navigator.language.startsWith('nl') ? 'nl' : (navigator.language.startsWith('de') ? 'de' : 'en'));

const SUN_ICON = '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:20px;height:20px;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>';
const MOON_ICON = '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:20px;height:20px;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>';

function t(key) { return i18n[currentLang][key] || key; }

function applyTranslations() {
  document.querySelectorAll('[data-t]').forEach(el => {
    const key = el.getAttribute('data-t');
    if (i18n[currentLang][key]) {
      if (el.tagName === 'INPUT' || el.tagName === 'TEXTAREA') {
        el.placeholder = i18n[currentLang][key];
      } else {
        el.innerHTML = i18n[currentLang][key];
      }
    }
  });
  document.querySelectorAll('[data-t-title]').forEach(el => {
    const key = el.getAttribute('data-t-title');
    if (i18n[currentLang][key]) {
      el.title = i18n[currentLang][key];
    }
  });
}

function setLang(lang) {
  currentLang = lang;
  localStorage.setItem('nbdy_lang', currentLang);
  ['nl','en','de'].forEach(l => {
    const btn = document.getElementById('lang-'+l);
    if(btn) btn.classList.toggle('active', l === lang);
  });
  document.getElementById('lang-dropdown').classList.remove('open');
  applyTranslations();
  fetch('<?= SITE_URL ?>/api/set-lang.php', {
    method: 'POST',
    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    body: 'lang=' + lang
  });
}

function toggleLangDropdown() {
  document.getElementById('lang-dropdown').classList.toggle('open');
}

function initTheme() {
  const saved = localStorage.getItem('nbdy_theme');
  const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
  if (saved === 'dark' || (!saved && prefersDark)) {
    document.documentElement.classList.add('dark');
  }
  updateThemeIcon(false);
}

function toggleTheme() {
  document.documentElement.classList.toggle('dark');
  const isDark = document.documentElement.classList.contains('dark');
  localStorage.setItem('nbdy_theme', isDark ? 'dark' : 'light');
  updateThemeIcon(true);
  fetch('<?= SITE_URL ?>/api/set-theme.php', {
    method: 'POST',
    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    body: 'theme=' + (isDark ? 'dark' : 'light')
  });
}

function updateThemeIcon(animate) {
  const isDark = document.documentElement.classList.contains('dark');
  const wrap = document.getElementById('theme-icon');
  if (!wrap) return;
  if (animate) {
    wrap.style.opacity = '0';
    wrap.style.transform = 'scale(0.8) rotate(-30deg)';
    setTimeout(() => {
      wrap.innerHTML = isDark ? MOON_ICON : SUN_ICON;
      wrap.style.opacity = '1';
      wrap.style.transform = 'scale(1) rotate(0deg)';
    }, 150);
  } else {
    wrap.innerHTML = isDark ? MOON_ICON : SUN_ICON;
  }
}

function openLoginModal() { document.getElementById('login-modal').classList.add('open'); }
function closeLoginModal() { document.getElementById('login-modal').classList.remove('open'); }

function handleLogin(e) {
  e.preventDefault();
  const email = document.getElementById('login-email').value;
  const password = document.getElementById('login-password').value;
  fetch('<?= SITE_URL ?>/api/login.php', {
    method: 'POST',
    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    body: 'email=' + encodeURIComponent(email) + '&password=' + encodeURIComponent(password)
  })
  .then(r => r.json())
  .then(data => {
    if (data.success) {
      closeLoginModal();
      showToast(t('toast_welcome') + data.name);
      setTimeout(() => location.reload(), 800);
    } else {
      showToast(data.message || 'Error');
    }
  })
  .catch(() => showToast('Error'));
}

function handleLogout() {
  fetch('<?= SITE_URL ?>/api/logout.php', {method: 'POST'})
    .then(() => { showToast(t('toast_logout')); setTimeout(() => location.reload(), 800); });
}

function toggleMobile() {
  document.getElementById('mobile-menu').classList.toggle('open');
}

function showToast(msg) {
  const t = document.getElementById('toast');
  t.textContent = msg;
  t.classList.add('show');
  setTimeout(() => t.classList.remove('show'), 3000);
}

document.addEventListener('click', (e) => {
  const dropdown = document.getElementById('lang-dropdown');
  const toggle = document.getElementById('lang-toggle');
  if (dropdown && toggle && !dropdown.contains(e.target) && !toggle.contains(e.target)) {
    dropdown.classList.remove('open');
  }
});

document.querySelectorAll('.web-node').forEach(node => {
  node.addEventListener('mouseenter', () => {
    document.querySelector('.web-center').style.boxShadow = '0 0 60px rgba(184,160,96,0.35)';
  });
  node.addEventListener('mouseleave', () => {
    document.querySelector('.web-center').style.boxShadow = '';
  });
});

document.addEventListener('DOMContentLoaded', () => {
  initTheme();
  applyTranslations();
  setLang(currentLang);
});
</script>

<?php if (isset($extraJs)): foreach ((array)$extraJs as $js): ?>
<script src="<?= ASSETS_URL ?>/js/<?= $js ?>"></script>
<?php endforeach; endif; ?>

</body>
</html>
