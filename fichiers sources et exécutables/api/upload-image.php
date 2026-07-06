<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$targetDir = __DIR__ . '/../images/photos attraction/';

if (!is_dir($targetDir)) {
    mkdir($targetDir, 0777, true);
}

if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
    $fileName = basename($_FILES['image']['name']);
    $fileName = preg_replace('/[^a-zA-Z0-9._-]/', '_', $fileName);
    $targetPath = $targetDir . $fileName;
    
    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
        echo json_encode(['success' => true, 'path' => 'images/photos attraction/' . $fileName, 'filename' => $fileName]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Erreur lors du déplacement du fichier']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Aucun fichier uploadé ou erreur: ' . ($_FILES['image']['error'] ?? 'pas de fichier')]);
}