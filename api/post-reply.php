<?php
/**
 * nBdy API — Post Forum Reply
 * POST: topic_id, content, csrf_token
 */
require_once __DIR__ . '/../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ' . SITE_URL . '/pages/forum.php');
    exit;
}

requireLogin();

$topicId = (int)($_POST['topic_id'] ?? 0);
$content = trim($_POST['content'] ?? '');
$csrf = $_POST['csrf_token'] ?? '';

if (!validateCsrfToken($csrf) || $topicId <= 0 || empty($content)) {
    header('Location: ' . SITE_URL . '/pages/forum.php');
    exit;
}

$user = getCurrentUser();

// Insert reply
$stmt = db()->prepare("INSERT INTO forum_replies (topic_id, author_id, content, created_at) VALUES (?, ?, ?, NOW())");
$stmt->execute([$topicId, $user['id'], $content]);

// Update topic reply count and last reply
$stmt = db()->prepare("UPDATE forum_topics SET reply_count = reply_count + 1, last_reply_at = NOW() WHERE id = ?");
$stmt->execute([$topicId]);

// Get topic slug for redirect
$stmt = db()->prepare("SELECT slug FROM forum_topics WHERE id = ?");
$stmt->execute([$topicId]);
$topic = $stmt->fetch();

header('Location: ' . forumUrl($topic['slug'] ?? '') . '#replies');
exit;
