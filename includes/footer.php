<?php
$lang = getCurrentLang();
?>
</main>

<footer class="footer" id="over">
  <div class="footer-stamp">nBdy — Voor en van iedereen</div>
  <p data-t="footer_desc">Alles is verbonden. Jij bent hier niet toevallig.</p>
  <div class="footer-links">
    <a href="#stroom" data-t="footer_verhalen">Verhalen</a>
    <a href="#" data-t="footer_videos">Video's</a>
    <a href="#" data-t="footer_fotos">Foto's</a>
    <a href="#forum" data-t="footer_forum">Het Forum</a>
    <a href="#plek" data-t="footer_de_plek">De Plek</a>
    <a href="<?= SITE_URL ?>/pages/contact.php" data-t="footer_contact">Contact</a>
  </div>
  <a href="#" class="join-btn" data-t="footer_cta_btn">Word onderdeel van dit universum</a>
</footer>

<script>
// ── Volledig origineel i18n object ─────────────────────────
const i18n = {
  nl: {
    nav_stroom: 'De Stroom', nav_forum: 'Het Forum', nav_plek: 'De Plek', nav_over: 'Over nBdy',
    nav_write: 'Verhaal', nav_login: 'Inloggen', nav_logout: 'Uitloggen',
    lang_nl: 'Nederlands', lang_en: 'English', lang_de: 'Deutsch',
    hero_label: 'Een collectief van zielen',
    hero_title: 'Alles is <em style="color:var(--gold)">verbonden</em>.<br>Jij bent hier niet toevallig.',
    hero_sub: 'Een plek waar verhalen worden gedeeld, niet gehouden. Waar het donker wordt erkend en het licht wordt gevierd. Samen, niet alleen.',
    hero_cta1: 'Verken de stroom', hero_cta2: 'De Plek',
    web_f: 'Filosofie', web_p: 'Persoonlijk', web_m: 'Maatschappij',
    web_k: 'Kunst', web_n: 'Natuur', web_s: 'Stilte',
    stats_zielen: 'Zielen', stats_verhalen: 'Verhalen', stats_verbindingen: 'Verbindingen', stats_plek: 'Plek',
    stroom_title: 'De Stroom', stroom_all: 'Alles bekijken →',
    card_feat_tag: 'Filosofie',
    card_feat_title: 'De ultieme blauwdruk voor ontologische vrijheid',
    card_feat_desc: 'Wat betekent het om werkelijk vrij te zijn? Niet alleen van ketenen, maar van de ideeën die ons gevangen houden zonder dat we het merken.',
    card_s1_tag: 'Persoonlijk',
    card_s1_title: 'De Bladzijden van het leven',
    card_s1_desc: "Sommige pagina's worden gescheurd, verbrand, of vergeten...",
    card_s1_meta: '01.07.2026 · 4 min',
    card_s2_tag: 'Video',
    card_s2_title: 'De stilte tussen de woorden',
    card_s2_desc: 'Soms zegt het niets-zeggen meer dan duizend zinnen...',
    card_s2_meta: '05.07.2026 · 4:32',
    card_s3_tag: 'Maatschappij',
    card_s3_title: 'Het Verhaal van Mesopotamia',
    card_s3_desc: 'Wie waren we voordat de geschiedenis ons vertelde wie we moesten zijn?',
    card_s3_meta: '24.06.2026 · 9 min',
    verder_title: 'Verder lezen', verder_archief: 'Archief →',
    card_r1_tag: 'Persoonlijk',
    card_r1_title: 'De Reis van het Leven',
    card_r1_desc: 'We denken dat we reizen naar een bestemming. Maar het pad zelf is het enige dat telt.',
    card_r2_tag: 'Filosofie',
    card_r2_title: '10 over 12',
    card_r2_desc: 'Er is een moment waarop de klok stil lijkt te staan. Waarop alles wacht.',
    card_r3_tag: 'Persoonlijk',
    card_r3_title: 'Onverwachts een les over Anorexia',
    card_r3_desc: 'Sommige lessen komen niet uit boeken. Ze komen uit de ogen van iemand die vecht.',
    forum_title: 'Het Forum', forum_all: 'Bekijk alles →',
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
    plek_label: 'Onze droom', plek_title: 'De Plek',
    plek_desc1: "Een blokhut, verscholen tussen de bomen. Dichtbij water — een stil meer, een kabbelend beekje. 's Avonds een kampvuur dat knettert terwijl de sterren tevoorschijn komen.",
    plek_desc2: 'Geen therapie, geen programma. Gewoon zijn. Samen rond het vuur. Praten als je wilt, zwijgen als je moet. Een plek waar zielen mogen rusten, mogen praten, mogen verbinden. Dat is waar we naartoe werken.',
    plek_hectare: 'Hectare', plek_zielen: 'Zielen', plek_droom: 'Droom',
    plek_caption: 'De droom — een kampvuur, water, en de stilte van het bos',
    oefening_label: 'De oefening',
    oefening_quote: '"Wie ben jij wanneer je niets hoeft te presteren — zelfs niet voor jezelf?"',
    oefening_desc: "Deze week nodigen we je uit om vijf minuten per dag in stilte te zitten. Niet om iets te bereiken, niet om te mediteren 'zoals het hoort'. Gewoon om te zijn. Merk op wat opkomt zonder het te veroordelen. Dat is waar groei begint: in het ruimte maken voor wat er al is.",
    oefening_cta: 'Deel je ervaring in het forum',
    stemmen_title: 'Stemmen uit de stroom', stemmen_all: 'Alle stemmen →',
    stemmen_1_quote: "Ik kwam hier op een nacht dat ik het niet meer zag zitten. Ik dacht: nog een forum, nog een plek waar niemand me echt hoort. Maar hier was iemand om drie uur 's nachts. Een vreemde die me niet kende, maar me wel zag. Dat heeft alles veranderd.",
    stemmen_1_name: 'L.', stemmen_1_role: 'Lid sinds maart 2026',
    stemmen_2_quote: 'Voor het eerst in mijn leven voel ik me niet alleen in mijn denken. Niet omdat iedereen het met me eens is, maar omdat hier ruimte is voor vragen zonder antwoorden. Dat is zeldzaam.',
    stemmen_2_name: 'M.', stemmen_2_role: 'Lid sinds januari 2026',
    stemmen_3_quote: 'Ik dacht dat ik hier kwam om te leren. Maar ik merk dat ik hier vooral kom om te herinneren wie ik was voordat de wereld me vertelde wie ik moest zijn.',
    stemmen_3_name: 'Anoniem', stemmen_3_role: 'Lid sinds juni 2026',
    footer_desc: 'Alles is verbonden. Jij bent hier niet toevallig.',
    footer_verhalen: 'Verhalen', footer_videos: "Video's", footer_fotos: "Foto's", footer_archief: 'Archief',
    footer_forum: 'Het Forum', footer_de_plek: 'De Plek', footer_verbinding: 'Verbinding', footer_contact: 'Contact',
    footer_cta_text: 'Jij bent hier niet toevallig.', footer_cta_btn: 'Word onderdeel',
    login_welcome: 'Welkom terug, ziel.', password: 'Wachtwoord', login_btn: 'Inloggen',
    toast_welcome: 'Welkom, ', toast_logout: 'Je bent uitgelogd', toast_write_soon: 'Schrijf functionaliteit komt binnenkort'
  },
  en: {
    nav_stroom: 'The Stream', nav_forum: 'The Forum', nav_plek: 'The Place', nav_over: 'About nBdy',
    nav_write: 'Story', nav_login: 'Sign in', nav_logout: 'Sign out',
    lang_nl: 'Nederlands', lang_en: 'English', lang_de: 'Deutsch',
    hero_label: 'A collective of souls',
    hero_title: 'Everything is <em style="color:var(--gold)">connected</em>.<br>You are not here by chance.',
    hero_sub: 'A place where stories are shared, not kept. Where darkness is acknowledged and light is celebrated. Together, not alone.',
    hero_cta1: 'Explore the stream', hero_cta2: 'The Place',
    web_f: 'Philosophy', web_p: 'Personal', web_m: 'Society',
    web_k: 'Art', web_n: 'Nature', web_s: 'Silence',
    stats_zielen: 'Souls', stats_verhalen: 'Stories', stats_verbindingen: 'Connections', stats_plek: 'Place',
    stroom_title: 'The Stream', stroom_all: 'View all →',
    card_feat_tag: 'Philosophy',
    card_feat_title: 'The ultimate blueprint for ontological freedom',
    card_feat_desc: 'What does it mean to be truly free? Not just from chains, but from the ideas that hold us captive without us noticing.',
    card_s1_tag: 'Personal',
    card_s1_title: 'The Pages of Life',
    card_s1_desc: 'Some pages are torn, burned, or forgotten...',
    card_s1_meta: '01.07.2026 · 4 min',
    card_s2_tag: 'Video',
    card_s2_title: 'The silence between words',
    card_s2_desc: 'Sometimes saying nothing says more than a thousand sentences...',
    card_s2_meta: '05.07.2026 · 4:32',
    card_s3_tag: 'Society',
    card_s3_title: 'The Story of Mesopotamia',
    card_s3_desc: 'Who were we before history told us who we had to be?',
    card_s3_meta: '24.06.2026 · 9 min',
    verder_title: 'Further Reading', verder_archief: 'Archive →',
    card_r1_tag: 'Personal',
    card_r1_title: 'The Journey of Life',
    card_r1_desc: 'We think we travel to a destination. But the path itself is all that matters.',
    card_r2_tag: 'Philosophy',
    card_r2_title: '10 past 12',
    card_r2_desc: 'There is a moment when the clock seems to stand still. When everything waits.',
    card_r3_tag: 'Personal',
    card_r3_title: 'An unexpected lesson about Anorexia',
    card_r3_desc: 'Some lessons do not come from books. They come from the eyes of someone who is fighting.',
    forum_title: 'The Forum', forum_all: 'View all →',
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
    plek_label: 'Our dream', plek_title: 'The Place',
    plek_desc1: 'A cabin, hidden among the trees. Close to water — a silent lake, a babbling brook. In the evening a crackling campfire as the stars appear.',
    plek_desc2: 'No therapy, no program. Just being. Together around the fire. Talk when you want, be silent when you must. A place where souls may rest, may talk, may connect. That is what we are working towards.',
    plek_hectare: 'Hectare', plek_zielen: 'Souls', plek_droom: 'Dream',
    plek_caption: 'The dream — a campfire, water, and the silence of the forest',
    oefening_label: 'The practice',
    oefening_quote: '"Who are you when you have nothing to perform — not even for yourself?"',
    oefening_desc: 'This week we invite you to sit in silence for five minutes a day. Not to achieve something, not to meditate "the right way". Just to be. Notice what arises without judging it. That is where growth begins: in making space for what already is.',
    oefening_cta: 'Share your experience in the forum',
    stemmen_title: 'Voices from the stream', stemmen_all: 'All voices →',
    stemmen_1_quote: "I came here on a night when I couldn't see a way out. I thought: another forum, another place where no one really hears me. But here was someone at three in the morning. A stranger who didn't know me, but saw me. That changed everything.",
    stemmen_1_name: 'L.', stemmen_1_role: 'Member since March 2026',
    stemmen_2_quote: 'For the first time in my life I do not feel alone in my thinking. Not because everyone agrees with me, but because here there is room for questions without answers. That is rare.',
    stemmen_2_name: 'M.', stemmen_2_role: 'Member since January 2026',
    stemmen_3_quote: 'I thought I came here to learn. But I find I come here mainly to remember who I was before the world told me who I had to be.',
    stemmen_3_name: 'Anonymous', stemmen_3_role: 'Member since June 2026',
    footer_desc: 'Everything is connected. You are not here by chance.',
    footer_verhalen: 'Stories', footer_videos: 'Videos', footer_fotos: 'Photos', footer_archief: 'Archive',
    footer_forum: 'The Forum', footer_de_plek: 'The Place', footer_verbinding: 'Connection', footer_contact: 'Contact',
    footer_cta_text: 'You are not here by chance.', footer_cta_btn: 'Become part',
    login_welcome: 'Welcome back, soul.', password: 'Password', login_btn: 'Sign in',
    toast_welcome: 'Welcome, ', toast_logout: 'You are signed out', toast_write_soon: 'Writing functionality coming soon'
  },
  de: {
    nav_stroom: 'Der Strom', nav_forum: 'Das Forum', nav_plek: 'Der Ort', nav_over: 'Über nBdy',
    nav_write: 'Geschichte', nav_login: 'Anmelden', nav_logout: 'Abmelden',
    lang_nl: 'Nederlands', lang_en: 'English', lang_de: 'Deutsch',
    hero_label: 'Ein Kollektiv von Seelen',
    hero_title: 'Alles ist <em style="color:var(--gold)">verbunden</em>.<br>Du bist nicht zufällig hier.',
    hero_sub: 'Ein Ort, an dem Geschichten geteilt werden, nicht gehalten. Wo Dunkelheit anerkannt und Licht gefeiert wird. Zusammen, nicht allein.',
    hero_cta1: 'Erkunde den Strom', hero_cta2: 'Der Ort',
    web_f: 'Philosophie', web_p: 'Persönlich', web_m: 'Gesellschaft',
    web_k: 'Kunst', web_n: 'Natur', web_s: 'Stille',
    stats_zielen: 'Seelen', stats_verhalen: 'Geschichten', stats_verbindingen: 'Verbindungen', stats_plek: 'Ort',
    stroom_title: 'Der Strom', stroom_all: 'Alle ansehen →',
    card_feat_tag: 'Philosophie',
    card_feat_title: 'Der ultimative Bauplan für ontologische Freiheit',
    card_feat_desc: 'Was bedeutet es, wirklich frei zu sein? Nicht nur von Ketten, sondern von den Ideen, die uns gefangen halten, ohne dass wir es merken.',
    card_s1_tag: 'Persönlich',
    card_s1_title: 'Die Seiten des Lebens',
    card_s1_desc: 'Manche Seiten werden zerrissen, verbrannt oder vergessen...',
    card_s1_meta: '01.07.2026 · 4 Min',
    card_s2_tag: 'Video',
    card_s2_title: 'Die Stille zwischen den Worten',
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
    card_r2_title: '10 nach 12',
    card_r2_desc: 'Es gibt einen Moment, in dem die Uhr still zu stehen scheint. In dem alles wartet.',
    card_r3_tag: 'Persönlich',
    card_r3_title: 'Eine unerwartete Lektion über Anorexie',
    card_r3_desc: 'Manche Lektionen kommen nicht aus Büchern. Sie kommen aus den Augen von jemandem, der kämpft.',
    forum_title: 'Das Forum', forum_all: 'Alle ansehen →',
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
    plek_label: 'Unser Traum', plek_title: 'Der Ort',
    plek_desc1: 'Eine Blockhütte, versteckt zwischen den Bäumen. Nah am Wasser — ein stiller See, ein plätschernder Bach. Abends ein knisterndes Lagerfeuer, während die Sterne hervorkommen.',
    plek_desc2: 'Keine Therapie, kein Programm. Einfach sein. Zusammen um das Feuer. Reden wenn du willst, schweigen wenn du musst. Ein Ort, an dem Seelen ruhen, reden, sich verbinden dürfen. Darauf arbeiten wir hin.',
    plek_hectare: 'Hektar', plek_zielen: 'Seelen', plek_droom: 'Traum',
    plek_caption: 'Der Traum — ein Lagerfeuer, Wasser und die Stille des Waldes',
    oefening_label: 'Die Übung',
    oefening_quote: '"Wer bist du, wenn du nichts leisten musst — nicht einmal für dich selbst?"',
    oefening_desc: 'Diese Woche laden wir dich ein, fünf Minuten am Tag in Stille zu sitzen. Nicht, um etwas zu erreichen, nicht, um "richtig" zu meditieren. Einfach nur, um zu sein. Beobachte, was aufkommt, ohne es zu verurteilen. Dort beginnt Wachstum: im Raumschaffen für das, was bereits ist.',
    oefening_cta: 'Teile deine Erfahrung im Forum',
    stemmen_title: 'Stimmen aus dem Strom', stemmen_all: 'Alle Stimmen →',
    stemmen_1_quote: 'Ich kam hierher in einer Nacht, in der ich keinen Ausweg mehr sah. Ich dachte: noch ein Forum, noch ein Ort, an dem mich niemand wirklich hört. Aber hier war jemand um drei Uhr morgens. Ein Fremder, der mich nicht kannte, aber mich sah. Das hat alles verändert.',
    stemmen_1_name: 'L.', stemmen_1_role: 'Mitglied seit März 2026',
    stemmen_2_quote: 'Zum ersten Mal in meinem Leben fühle ich mich in meinem Denken nicht allein. Nicht weil alle mir zustimmen, sondern weil hier Raum ist für Fragen ohne Antworten. Das ist selten.',
    stemmen_2_name: 'M.', stemmen_2_role: 'Mitglied seit Januar 2026',
    stemmen_3_quote: 'Ich dachte, ich käme hierher, um zu lernen. Aber ich merke, dass ich hier vor allem komme, um mich daran zu erinnern, wer ich war, bevor die Welt mir erzählte, wer ich sein musste.',
    stemmen_3_name: 'Anonym', stemmen_3_role: 'Mitglied seit Juni 2026',
    footer_desc: 'Alles ist verbunden. Du bist nicht zufällig hier.',
    footer_verhalen: 'Geschichten', footer_videos: 'Videos', footer_fotos: 'Fotos', footer_archief: 'Archiv',
    footer_forum: 'Das Forum', footer_de_plek: 'Der Ort', footer_verbinding: 'Verbindung', footer_contact: 'Kontakt',
    footer_cta_text: 'Du bist nicht zufällig hier.', footer_cta_btn: 'Werde Teil',
    login_welcome: 'Willkommen zurück, Seele.', password: 'Passwort', login_btn: 'Anmelden',
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
