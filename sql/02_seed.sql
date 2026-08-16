-- ============================================================
-- nBdy Seed Data
-- ============================================================
-- Run this AFTER schema.sql to populate with sample data
-- ============================================================

USE nbdy;

-- ============================================================
-- CATEGORIES
-- ============================================================
INSERT INTO categories (slug, name_nl, name_en, name_de, color, sort_order) VALUES
('filosofie', 'Filosofie', 'Philosophy', 'Philosophie', '#A67C3D', 1),
('persoonlijk', 'Persoonlijk', 'Personal', 'Persönlich', '#8B7355', 2),
('maatschappij', 'Maatschappij', 'Society', 'Gesellschaft', '#6B5A48', 3),
('kunst', 'Kunst', 'Art', 'Kunst', '#C49450', 4),
('natuur', 'Natuur', 'Nature', 'Natur', '#5C7A5C', 5),
('stilte', 'Stilte', 'Silence', 'Stille', '#7A6B5C', 6),
('praktisch', 'Praktisch', 'Practical', 'Praktisch', '#8A7D6D', 7),
('video', 'Video', 'Video', 'Video', '#6B5A48', 8);

-- ============================================================
-- SITE SETTINGS
-- ============================================================
INSERT INTO site_settings (setting_key, setting_value) VALUES
('site_name', 'nBdy'),
('site_tagline_nl', 'Voor en van iedereen'),
('site_tagline_en', 'For and by everyone'),
('site_tagline_de', 'Für und von allen'),
('hero_label_nl', 'Een collectief van zielen'),
('hero_label_en', 'A collective of souls'),
('hero_label_de', 'Ein Kollektiv von Seelen'),
('hero_title_nl', 'Alles is verbonden. Jij bent hier niet toevallig.'),
('hero_title_en', 'Everything is connected. You are not here by chance.'),
('hero_title_de', 'Alles ist verbunden. Du bist nicht zufällig hier.'),
('hero_sub_nl', 'Een plek waar verhalen worden gedeeld, niet gehouden. Waar het donker wordt erkend en het licht wordt gevierd. Samen, niet alleen.'),
('hero_sub_en', 'A place where stories are shared, not kept. Where darkness is acknowledged and light is celebrated. Together, not alone.'),
('hero_sub_de', 'Ein Ort, an dem Geschichten geteilt werden, nicht gehalten. Wo Dunkelheit anerkannt und Licht gefeiert wird. Zusammen, nicht allein.'),
('stats_souls', '247'),
('stats_stories', '89'),
('stats_connections', '1400'),
('stats_place', '1'),
('plek_title_nl', 'De Plek'),
('plek_title_en', 'The Place'),
('plek_title_de', 'Der Ort'),
('plek_desc1_nl', "Een blokhut, verscholen tussen de bomen. Dichtbij water — een stil meer, een kabbelend beekje. 's Avonds een kampvuur dat knettert terwijl de sterren tevoorschijn komen."),
('plek_desc1_en', 'A cabin, hidden among the trees. Close to water — a silent lake, a babbling brook. In the evening a crackling campfire as the stars appear.'),
('plek_desc1_de', 'Eine Blockhütte, versteckt zwischen den Bäumen. Nah am Wasser — ein stiller See, ein plätschernder Bach. Abends ein knisterndes Lagerfeuer, während die Sterne hervorkommen.'),
('plek_desc2_nl', 'Geen therapie, geen programma. Gewoon zijn. Samen rond het vuur. Praten als je wilt, zwijgen als je moet. Een plek waar je kunt uitrusten, praten en ontmoeten. Dat is waar we naartoe werken.'),
('plek_desc2_en', 'No therapy, no program. Just being. Together around the fire. Talk when you want, be silent when you must. A place where you can rest, talk, and meet others. That is what we are working towards.'),
('plek_desc2_de', 'Keine Therapie, kein Programm. Einfach sein. Zusammen um das Feuer. Reden wenn du willst, schweigen wenn du musst. Ein Ort, an dem du ausruhen, reden und andere treffen kannst. Darauf arbeiten wir hin.'),
('plek_caption_nl', 'De droom — een kampvuur, water, en de stilte van het bos'),
('plek_caption_en', 'The dream — a campfire, water, and the silence of the forest'),
('plek_caption_de', 'Der Traum — ein Lagerfeuer, Wasser und die Stille des Waldes');

-- ============================================================
-- STORIES
-- ============================================================
INSERT INTO stories (slug, title, excerpt, content, featured_image, category_id, status, is_featured, read_time, published_at) VALUES
('wat-betekent-vrijheid', 'Wat betekent vrijheid echt?', 
 'Wat betekent het om werkelijk vrij te zijn? Niet alleen van ketenen, maar van de ideeën die ons gevangen houden zonder dat we het merken.',
 '<p>Wat betekent het om werkelijk vrij te zijn? Niet alleen van ketenen, maar van de ideeën die ons gevangen houden zonder dat we het merken.</p><p>Deze vraag heeft mensen al duizenden jaren beziggehouden. Van de Stoïcijnen tot Sartre, van Boeddha tot de hedendaagse existentiële therapeuten — iedereen probeert het antwoord te benaderen.</p><p>Maar misschien is vrijheid geen bestemming. Misschien is het een praktijk. Een dagelijkse keuze om bewust te zijn van de patronen die ons vormen.</p>',
 'https://kimi-web-img.moonshot.cn/img/c8.alamy.com/7185641aaa8110f66e248bdf95d8aed6a2d8d9c0.jpg',
 1, 'published', 1, '8 min', '2026-07-28 10:00:00'),

('bladzijden-van-het-leven', 'De bladzijden van het leven',
 "Sommige pagina's worden gescheurd, verbrand, of vergeten...",
 "<p>Sommige pagina's worden gescheurd, verbrand, of vergeten. Maar elk hoofdstuk maakt het verhaal compleet.</p><p>We denken vaak dat we ons verleden moeten verbergen. Dat de pijnlijke momenten beter worden weggestopt. Maar juist die pagina's — de gekreukte, de beschreven, de vlekkerige — geven ons verhaal diepte.</p>",
 'https://kimi-web-img.moonshot.cn/img/thumbs.dreamstime.com/e83d395b0510af684bee2ddfc0fdec7add6255c7.jpg',
 2, 'published', 0, '4 min', '2026-07-01 14:30:00'),

('stilte-zegt-meer', 'Soms zegt stilte meer dan woorden',
 'Soms zegt het niets-zeggen meer dan duizend zinnen...',
 '<p>Soms zegt het niets-zeggen meer dan duizend zinnen. In de stilte vinden we wat woorden niet kunnen uitdrukken.</p><p>We leven in een wereld die constant praat. Notificaties, nieuws, meningen — het is nooit stil. Maar juist in die stilte, wanneer we stoppen met spreken, horen we wat er werkelijk toe doet.</p>',
 'https://kimi-web-img.moonshot.cn/img/thumbs.dreamstime.com/076395295781c9f3fdba43a9184a74f0a629d409.jpg',
 8, 'published', 0, '4:32', '2026-07-05 09:15:00'),

('verhaal-van-mesopotamia', 'Het verhaal van Mesopotamia',
 'Wie waren we voordat de geschiedenis ons vertelde wie we moesten zijn?',
 '<p>Wie waren we voordat de geschiedenis ons vertelde wie we moesten zijn? Mesopotamia, het land tussen de rivieren, was de wieg van beschaving. Maar wie waren de mensen die daar leefden?</p><p>Ze hadden verhalen, dromen, angsten en hoop — net zoals wij. De geschiedenisboeken vertellen ons over koningen en veldslagen, maar de echte verhalen zitten in de klei tabletjes, de liefdesbrieven, de dagboeken van gewone mensen.</p>',
 'https://kimi-web-img.moonshot.cn/img/thumbs.dreamstime.com/102f98b81e9a7815516eadd3661f2cee373ff794.jpg',
 3, 'published', 0, '9 min', '2026-06-24 16:45:00'),

('reis-van-het-leven', 'De reis van het leven',
 'We denken dat we reizen naar een bestemming. Maar het pad zelf is het enige dat telt.',
 '<p>We denken dat we reizen naar een bestemming. Maar het pad zelf is het enige dat telt.</p><p>De bestemming is een illusie. Er is geen eindpunt waar we aankomen en plotseling "klaar" zijn. Het leven is de reis, en elke stap is even waardevol als de vorige.</p>',
 'https://kimi-web-img.moonshot.cn/img/media.istockphoto.com/ba4ed9eb43e38d856739fbb9a6f437208432a208.jpg',
 2, 'published', 0, '6 min', '2026-07-10 11:00:00'),

('tien-over-twaalf', 'Tien over twaalf',
 'Er is een moment waarop de klok stil lijkt te staan. Waarop alles wacht.',
 '<p>Er is een moment waarop de klok stil lijkt te staan. Waarop alles wacht. Twaalf uur, tien over twaalf — het is een metafoor voor die momenten van stilstand in ons leven.</p><p>Soms moeten we even stoppen. Niet omdat we moe zijn, maar omdat we even moeten kijken waar we zijn voordat we verder gaan.</p>',
 'https://kimi-web-img.moonshot.cn/img/thumbs.dreamstime.com/e0652ddbc0b7c4934b5f40841810eab063c19d83.jpg',
 1, 'published', 0, '5 min', '2026-07-08 08:30:00'),

('les-over-anorexia', 'Onverwachts een les over anorexia',
 'Sommige lessen komen niet uit boeken. Ze komen uit de ogen van iemand die vecht.',
 '<p>Sommige lessen komen niet uit boeken. Ze komen uit de ogen van iemand die vecht.</p><p>Anorexia is meer dan een eetstoornis. Het is een strijd om controle, om perfectie, om acceptatie. En soms komt de grootste les uit het meest onverwachte gesprek.</p>',
 'https://kimi-web-img.moonshot.cn/img/www.shutterstock.com/46bbef0ca0fe844417c04d9ce4dc6604b7942672.jpg',
 2, 'published', 0, '7 min', '2026-07-03 19:00:00');

-- ============================================================
-- FORUM TOPICS
-- ============================================================
INSERT INTO forum_topics (slug, title, content, category_id, status, reply_count, view_count, created_at) VALUES
('lastige-buur', 'Hoe ga je om met een lastige buur?',
 "Ik woon hier nu twee jaar en de buren maken elke avond lawaai tot 2 uur 's nachts. Ik wil geen ruzie, maar mijn rust is op. Heeft iemand tips voor een vreedzame oplossing?",
 7, 'open', 23, 156, '2026-08-12 17:30:00'),

('gevoelens-uiten', 'Ik durf mijn gevoelens niet te uiten',
 'Mijn hele leven heb ik geleerd om sterk te zijn. Nu merk ik dat ik helemaal niet weet hoe ik moet praten over wat ik voel. Het voelt alsof ik een muur heb opgebouwd die ik niet meer kan afbreken.',
 2, 'open', 47, 312, '2026-08-12 14:15:00'),

('vrijheid-illusie', 'Wat als vrijheid een illusie is?',
 'We denken dat we keuzes hebben, maar hoeveel van onze beslissingen worden bepaald door wat anderen van ons verwachten? Is echte vrijheid wel mogelijk in een maatschappij die ons constant vormt?',
 1, 'open', 18, 89, '2026-08-11 09:00:00');

-- ============================================================
-- TESTIMONIALS
-- ============================================================
INSERT INTO testimonials (quote_nl, quote_en, quote_de, author_name, author_role, author_init, sort_order) VALUES
(
  'Ik had een vraag over mijn buurman. Binnen een uur had ik vijf bruikbare tips. Dat had ik niet verwacht.',
  "I had a question about my neighbor. Within an hour I had five useful tips. I didn't expect that.",
  'Ich hatte eine Frage zu meinem Nachbarn. Innerhalb einer Stunde hatte ich fünf nützliche Tipps. Damit hatte ich nicht gerechnet.',
  'L.', 'Lid sinds maart 2026', 'L', 1
),
(
  'Hier kan ik gewoon schrijven wat ik denk, zonder dat iemand me raar aankijkt.',
  'Here I can just write what I think, without anyone looking at me strangely.',
  'Hier kann ich einfach aufschreiben, was ich denke, ohne dass mich jemand komisch anschaut.',
  'M.', 'Lid sinds januari 2026', 'M', 2
),
(
  'Ik kwam hier met een vraag over werkstress. De reacties waren eerlijk en praktisch. Precies wat ik nodig had.',
  'I came here with a question about work stress. The responses were honest and practical. Exactly what I needed.',
  'Ich kam hierher mit einer Frage zu Arbeitsstress. Die Antworten waren ehrlich und praktisch. Genau was ich brauchte.',
  'Anoniem', 'Lid sinds juni 2026', 'A', 3
);

-- ============================================================
-- EXERCISES
-- ============================================================
INSERT INTO exercises (slug, label_nl, label_en, label_de, quote_nl, quote_en, quote_de, description_nl, description_en, description_de, cta_nl, cta_en, cta_de, week_start, is_active) VALUES
(
  'stilte-oefening-aug-2026',
  'De oefening',
  'The practice',
  'Die Übung',
  '"Deze week: vijf minuten stilzitten. Geen doel, geen prestatie. Gewoon even niets."',
  '"This week: five minutes of sitting still. No goal, no performance. Just a moment of nothing."',
  '"Diese Woche: fünf Minuten stillsitzen. Kein Ziel, keine Leistung. Einfach einen Moment nichts."',
  'Je hoeft niets te veranderen. Soms is stilte genoeg.',
  "You don't have to change anything. Sometimes silence is enough.",
  'Du musst nichts ändern. Manchmal ist Stille genug.',
  'Deel je ervaring in het forum',
  'Share your experience in the forum',
  'Teile deine Erfahrung im Forum',
  '2026-08-10', 1
);
