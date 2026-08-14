<?php
/**
 * nBdy — Database Connection (XAMPP)
 * ===================================
 * Standaard XAMPP instellingen:
 * - Host: localhost
 * - Database: nbdy
 * - Gebruiker: root
 * - Wachtwoord: (leeg)
 * - Poort: 3306 (standaard MySQL poort)
 * 
 * Pas alleen DB_PASS aan als je een MySQL wachtwoord hebt ingesteld in XAMPP.
 */

class Database {
    private static ?PDO $instance = null;

    // XAMPP database instellingen
    private const DB_HOST = 'localhost';
    private const DB_NAME = 'nbdy';
    private const DB_USER = 'root';
    private const DB_PASS = '';      // XAMPP standaard = geen wachtwoord
    private const DB_CHARSET = 'utf8mb4';
    private const DB_PORT = '3306';  // MySQL standaard poort

    public static function getInstance(): PDO {
        if (self::$instance === null) {
            try {
                $dsn = "mysql:host=" . self::DB_HOST . ";port=" . self::DB_PORT . ";dbname=" . self::DB_NAME . ";charset=" . self::DB_CHARSET;
                self::$instance = new PDO($dsn, self::DB_USER, self::DB_PASS, [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ]);
            } catch (PDOException $e) {
                error_log("Database connection failed: " . $e->getMessage());
                die("<div style='padding:40px;font-family:sans-serif;max-width:600px;margin:0 auto;'>
                    <h2 style='color:#A67C3D;'>Databaseverbinding mislukt</h2>
                    <p><strong>Foutmelding:</strong> " . htmlspecialchars($e->getMessage()) . "</p>
                    <hr style='border:none;border-top:1px solid #ddd;margin:20px 0;'>
                    <p><strong>Controleer het volgende:</strong></p>
                    <ol>
                        <li>Is XAMPP gestart? (Apache + MySQL)</li>
                        <li>Bestaat de database <code>nbdy</code>? Maak deze aan in phpMyAdmin</li>
                        <li>Heb je een MySQL wachtwoord ingesteld? Pas dan <code>DB_PASS</code> aan in <code>includes/db.php</code></li>
                        <li>Draait MySQL op poort 3306? Zo niet, pas <code>DB_PORT</code> aan</li>
                    </ol>
                    <p style='margin-top:20px;color:#666;'>Als je hulp nodig hebt, open <code>includes/db.php</code> en pas de instellingen aan.</p>
                </div>");
            }
        }
        return self::$instance;
    }

    private function __clone() {}
}

// Helper: snelle query
function db(): PDO {
    return Database::getInstance();
}
