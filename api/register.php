<?php
require_once __DIR__ . '/../includes/functions.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

$email    = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$name     = trim($_POST['name'] ?? '');
$csrf     = $_POST['csrf_token'] ?? '';

if (!validateCsrfToken($csrf)) {
    echo json_encode(['success' => false, 'message' => 'Invalid CSRF token']);
    exit;
}

if (empty($email) || empty($password) || empty($name)) {
    echo json_encode(['success' => false, 'message' => 'Alle velden zijn verplicht']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Ongeldig emailadres']);
    exit;
}

if (strlen($password) < 8) {
    echo json_encode(['success' => false, 'message' => 'Wachtwoord moet minimaal 8 tekens zijn']);
    exit;
}

$stmt = db()->prepare("SELECT id FROM users WHERE email = ?");
$stmt->execute([$email]);
if ($stmt->fetch()) {
    echo json_encode(['success' => false, 'message' => 'Dit emailadres is al in gebruik']);
    exit;
}

$hash = password_hash($password, PASSWORD_ARGON2ID);
$init = mb_strtoupper(mb_substr($name, 0, 1));

$stmt = db()->prepare("INSERT INTO users (email, password_hash, display_name, avatar_init) VALUES (?, ?, ?, ?)");
$stmt->execute([$email, $hash, $name, $init]);

$_SESSION['nbdy_user_id'] = db()->lastInsertId();

echo json_encode(['success' => true, 'name' => $name, 'avatar' => $init]);
