# nBdy Website

> **Voor en van iedereen.** Een plek voor echte verhalen.

---

## 📁 Projectstructuur

```
nbdy-website/
├── index.php                  # Hoofdpagina — voegt alle secties samen
├── config.php                 # Database- en site-instellingen
├── .htaccess                  # Apache rewrite rules & security
│
├── sql/
│   ├── 01_schema.sql          # Database tabellen aanmaken
│   └── 02_seed.sql            # Voorbeeld data
│
├── includes/
│   ├── db.php                 # PDO database connectie
│   ├── functions.php          # Helper functies (taal, thema, security)
│   ├── header.php             # HTML <head> + navigatie
│   ├── footer.php             # Footer + scripts
│   ├── lang/
│   │   ├── nl.php             # Nederlandse vertalingen
│   │   ├── en.php             # Engelse vertalingen
│   │   └── de.php             # Duitse vertalingen
│   └── sections/              # 🔥 Alle homepage secties (modulair!)
│       ├── hero.php
│       ├── connect-web.php
│       ├── stats.php
│       ├── stories.php
│       ├── practice.php
│       ├── forum.php
│       ├── voices.php
│       └── place.php
│
├── pages/                     # Subpagina's
│   ├── article.php            # Verhaal detailpagina
│   ├── forum-topic.php        # Forum onderwerp
│   ├── archive.php            # Archief / alle verhalen
│   ├── forum.php              # Forum overzicht
│   ├── contact.php            # Contactpagina
│   └── profile.php            # Gebruikersprofiel
│
├── api/                       # AJAX endpoints
│   ├── login.php
│   ├── logout.php
│   ├── set-lang.php
│   ├── set-theme.php
│   └── post-reply.php
│
├── assets/
│   ├── css/style.css          # Alle styles
│   ├── js/main.js             # Extra JS modules
│   └── images/                # Upload hier je afbeeldingen
│
└── admin/                     # (placeholder voor admin panel)
```

---

## 🚀 Installatie

### 1. Vereisten
- PHP 8.1+
- MySQL 5.7+ of MariaDB 10.3+
- Apache met `mod_rewrite` aan

### 2. Database opzetten
```bash
mysql -u root -p < sql/01_schema.sql
mysql -u root -p nbdy < sql/02_seed.sql
```

### 3. Configuratie
Open `config.php` en pas aan:
```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'nbdy');
define('DB_USER', 'jouw_db_user');
define('DB_PASS', 'jouw_db_wachtwoord');
define('SITE_URL', 'https://jouwdomein.nl');
```

### 4. Upload
Upload alle bestanden naar je webserver. Zorg dat de map `assets/images` schrijfbaar is:
```bash
chmod 755 assets/images
```

---

## 🧩 Modulair werken

Elke sectie op de homepage is een apart bestand in `includes/sections/`. Je kunt ze:

- **Verwijderen:** Haal de `require_once` regel uit `index.php`
- **Verplaatsen:** Wijzig de volgorde in `index.php`
- **Dupliceren:** Kopieer het bestand en geef het een nieuwe naam
- **Aanpassen:** Bewerk alleen het specifieke bestand

### Voorbeeld: een nieuwe sectie toevoegen

1. Maak `includes/sections/mijn-sectie.php`
2. Voeg toe aan `index.php`:
   ```php
   <?php require_once __DIR__ . '/includes/sections/mijn-sectie.php'; ?>
   ```

---

## 🌍 Talen

Taalbestanden staan in `includes/lang/`. Om een nieuwe taal toe te voegen:

1. Kopieer `includes/lang/en.php` naar `includes/lang/fr.php`
2. Vertaal alle strings
3. Voeg toe aan `config.php`:
   ```php
   'fr' => ['name' => 'Français', 'flag' => '🇫🇷'],
   ```

---

## 🎨 Thema's

- **Light:** Standaard beige/goud thema
- **Dark:** Donker thema met gouden accenten
- **Auto:** Volgt systeemvoorkeur

De thema-switcher slaat de voorkeur op in `localStorage` (client) en de database (server, als ingelogd).

---

## 🔐 Security

- Alle database queries gebruiken **prepared statements**
- **CSRF tokens** op alle formulieren
- **Password hashing** met `password_hash()` / `password_verify()`
- **Input sanitization** met `htmlspecialchars()`
- `.htaccess` blokkeert toegang tot `includes/`, `sql/`, en `config.php`

---

## 📄 Licentie

Dit project is voor persoonlijk gebruik. Pas aan, verbeter, en maak het van jou.

*Alles is verbonden. Jij bent hier niet toevallig.*
