<?php
/**
 * nBdy API — Set Language
 * POST: lang
 */
require_once __DIR__ . '/../includes/functions.php';
header('Content-Type: application/json');

$lang = $_POST['lang'] ?? 'nl';
setLang($lang);

// Update user preference if logged in
if (isLoggedIn()) {
    $user = getCurrentUser();
    $stmt = db()->prepare("UPDATE users SET lang_preference = ? WHERE id = ?");
    $stmt->execute([$lang, $user['id']]);
}

echo json_encode(['success' => true, 'lang' => $lang]);
