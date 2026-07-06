<?php
require_once __DIR__ . '/../config.php';

header('Content-Type: application/json');

try {
    $stmt = $pdo->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    echo json_encode(['tables' => $tables]);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}