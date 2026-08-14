<?php
/**
 * nBdy API — Logout
 */
require_once __DIR__ . '/../includes/functions.php';
header('Content-Type: application/json');

session_destroy();
$_SESSION = [];

echo json_encode(['success' => true]);
