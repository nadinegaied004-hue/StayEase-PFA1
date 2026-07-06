<?php
require_once __DIR__ . '/../config.php';

header('Content-Type: application/json');

try {
    $stmt = $pdo->query("DESCRIBE evenement");
    echo json_encode(['structure' => $stmt->fetchAll(PDO::FETCH_ASSOC)]);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}