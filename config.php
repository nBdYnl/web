<?php
/**
 * nBdy — Configuration (XAMPP)
 * ============================
 * SITE_URL wordt automatisch gedetecteerd op basis van waar dit bestand staat.
 * Werkt met elke mapnaam: nbdy-website, nBdy, mijn-site, etc.
 */

// Database instellingen — XAMPP (MySQL/MariaDB)
define('DB_HOST', 'localhost');
define('DB_NAME', 'nbdy');
define('DB_USER', 'root');
define('DB_PASS', '');           // XAMPP standaard: geen wachtwoord
define('DB_CHARSET', 'utf8mb4');

// ── AUTO-DETECT SITE_URL ────────────────────────────────────
// Bepaad het pad vanaf de webroot (htdocs) naar deze config.php
$docRoot = rtrim(str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT'] ?? 'C:/xampp/htdocs'), '/');
$configDir = rtrim(str_replace('\\', '/', __DIR__), '/');
$basePath = str_replace($docRoot, '', $configDir); // bijv. "/nbdy-website" of "/nBdy"

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';

// Als we via CLI draaien (bijv. cron), gebruik een fallback
if (php_sapi_name() === 'cli') {
    define('SITE_URL', 'http://localhost' . $basePath);
} else {
    define('SITE_URL', $protocol . '://' . $host . $basePath);
}

// Paden (relatief vanaf root)
define('ASSETS_URL', SITE_URL . '/assets');
define('INCLUDES_PATH', __DIR__ . '/includes');

// Site info
define('SITE_NAME', 'nBdy');
define('SITE_EMAIL', 'hello@nbdy.nl');

// Taal & thema defaults
define('DEFAULT_LANG', 'nl');
define('DEFAULT_THEME', 'auto'); // 'light', 'dark', of 'auto'

// Beschikbare talen
$LANGUAGES = [
    'nl' => ['name' => 'Nederlands', 'flag' => '🇳🇱'],
    'en' => ['name' => 'English',    'flag' => '🇬🇧'],
    'de' => ['name' => 'Deutsch',    'flag' => '🇩🇪'],
];

// Beschikbare thema's
$THEMES = ['light', 'dark', 'auto'];

// Sessie & security
define('SESSION_NAME', 'nbdy_session');
define('CSRF_TOKEN_NAME', 'nbdy_csrf');

// Foutmeldingen (zet op false in productie!)
define('DEBUG_MODE', true);

if (DEBUG_MODE) {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
} else {
    error_reporting(0);
    ini_set('display_errors', '0');
}

// Start sessie
if (session_status() === PHP_SESSION_NONE) {
    session_name(SESSION_NAME);
    session_start();
}
