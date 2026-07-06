<?php
header('Content-Type: application/json');

require_once __DIR__ . '/../config.php';

// Fix the image path with special characters - set to empty for now
$stmt = $pdo->prepare("UPDATE attraction_et_reference SET IMAGE_ATTR = '' WHERE IMAGE_ATTR LIKE '%Capture%'");
$stmt->execute();

echo json_encode(['success' => true, 'message' => 'Image paths fixed']);