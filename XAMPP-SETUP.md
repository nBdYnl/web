# nBdy — XAMPP Installatiehandleiding

## 1. Project plaatsen
Pak `nbdy-website.zip` uit naar:
```
C:\xampp\htdocs\nbdy-website\
```

## 2. Database aanmaken (phpMyAdmin)
1. Start XAMPP -> Start Apache + MySQL
2. Ga naar: http://localhost/phpmyadmin
3. Klik op **Nieuw** (linksboven)
4. Database naam: `nbdy`
5. Klik **Aanmaken**

## 3. Tabellen importeren
1. Klik op de `nbdy` database (linker menu)
2. Ga naar het tabblad **SQL**
3. Open `nbdy-website/sql/01_schema.sql` in een teksteditor
4. Kopieer ALLE inhoud en plak in phpMyAdmin
5. Klik op **Go** (of Ctrl+Enter)

## 4. Voorbeelddata importeren
1. Ga opnieuw naar het tabblad **SQL**
2. Open `nbdy-website/sql/02_seed.sql`
3. Kopieer ALLE inhoud en plak in phpMyAdmin
4. Klik op **Go**

## 5. Configuratie check
Open `nbdy-website/config.php` — dit staat al goed voor XAMPP:
```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'nbdy');
define('DB_USER', 'root');
define('DB_PASS', '');        // XAMPP standaard = leeg
define('SITE_URL', 'http://localhost/nbdy-website');
```

> **Let op:** Als je MySQL in XAMPP een wachtwoord hebt gegeven, pas `DB_PASS` dan aan.

## 6. Site openen
Ga in je browser naar:
```
http://localhost/nbdy-website/
```

## 7. Eerste admin aanmaken (optioneel)
Ga naar phpMyAdmin -> `nbdy` -> `users` -> **Invoegen**

Vul in:
- email: `admin@nbdy.nl`
- password_hash: (zie hieronder)
- display_name: `Admin`
- avatar_init: `A`
- role: `admin`

**Wachtwoord hash genereren:**
Maak een tijdelijk bestand `hash.php` in htdocs:
```php
<?php echo password_hash('jouw_wachtwoord', PASSWORD_DEFAULT);
```
Open `http://localhost/hash.php` en kopieer de hash naar phpMyAdmin.

## Problemen?

### "Access denied for user 'root'@'localhost'"
-> Je hebt een MySQL wachtwoord ingesteld. Pas `DB_PASS` in `config.php` aan.

### "Unknown database 'nbdy'"
-> Stap 2 en 3 zijn overgeslagen. Maak de database handmatig aan in phpMyAdmin.

### Wit scherm / 500 error
-> Open `config.php` en zorg dat `DEBUG_MODE` op `true` staat. Dan zie je de exacte foutmelding.

### Mod_rewrite werkt niet
-> Zorg dat Apache module `mod_rewrite` is ingeschakeld in XAMPP Control Panel -> Config -> Apache (httpd.conf). Zoek naar `#LoadModule rewrite_module` en verwijder de `#`.
