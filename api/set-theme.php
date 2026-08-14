<?php
/**
 * nBdy API — Set Theme
 * POST: theme
 */
require_once __DIR__ . '/../includes/functions.php';
header('Content-Type: application/json');

$theme = $_POST['theme'] ?? 'auto';
setTheme($theme);

// Update user preference if logged in
if (isLoggedIn()) {
    $user = getCurrentUser();
    $stmt = db()->prepare("UPDATE users SET theme_preference = ? WHERE id = ?");
    $stmt->execute([$theme, $user['id']]);
}

echo json_encode(['success' => true, 'theme' => $theme]);
