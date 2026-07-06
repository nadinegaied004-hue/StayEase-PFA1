<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

require_once __DIR__ . '/../config.php';

$logements = [
    1 => 'Hotel Carthage',
    2 => 'Hotel Sidi Bou Said',
    6 => 'Hotel Royal Salem Sousse',
    10 => 'Villa Bord de Mer Bizerte'
];

try {
    foreach ($logements as $id => $nom) {
        $stmt = $pdo->prepare("UPDATE logement SET TITRE_LOG = ? WHERE ID_LOGEMENT = ?");
        $stmt->execute([$nom, $id]);
    }
    echo json_encode(['success' => true, 'message' => 'Noms restaurés']);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}