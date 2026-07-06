<?php
require_once __DIR__ . '/../config.php';

$stmt = $pdo->query("SELECT * FROM avis_evenement");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    print_r($row);
}