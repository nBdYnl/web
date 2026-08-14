<?php
/**
 * nBdy API — Login
 * POST: email, password, csrf_token
 * Returns JSON
 */
require_once __DIR__ . '/../includes/functions.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$csrf = $_POST['csrf_token'] ?? '';

if (!validateCsrfToken($csrf)) {
    echo json_encode(['success' => false, 'message' => 'Invalid CSRF token']);
    exit;
}

if (empty($email) || empty($password)) {
    echo json_encode(['success' => false, 'message' => 'Email and password required']);
    exit;
}

// In productie: gebruik password_verify() met hashes uit de database
// Hier een demo-login voor testdoeleinden
$stmt = db()->prepare("SELECT id, display_name, avatar_init, password_hash FROM users WHERE email = ? AND is_active = 1");
$stmt->execute([$email]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user['password_hash'])) {
    $_SESSION['nbdy_user_id'] = $user['id'];
    echo json_encode([
        'success' => true,
        'name' => $user['display_name'],
        'avatar' => $user['avatar_init']
    ]);
} else {
    // DEMO: als gebruiker niet bestaat, maak een tijdelijke sessie aan
    // VERWIJDER DIT IN PRODUCTIE!
    $name = explode('@', $email)[0];
    $name = ucfirst($name);
    echo json_encode([
        'success' => true,
        'name' => $name,
        'avatar' => strtoupper(substr($name, 0, 1)),
        'note' => 'Demo mode: no password check'
    ]);
}
