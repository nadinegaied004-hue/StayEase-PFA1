<?php
require_once __DIR__ . '/../config.php';

header('Content-Type: application/json');

try {
    $stmt = $pdo->query("SELECT VILLE_LOG FROM logement WHERE ID_LOGEMENT = 1");
    $log = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $stmt = $pdo->query("SELECT NOM_EVENEMENT, VILLE_EV, DATE_DEB_EV FROM evenement WHERE VILLE_EV = 'Carthage'");
    $evts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode(['logement_ville' => $log, 'evenements' => $evts]);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}