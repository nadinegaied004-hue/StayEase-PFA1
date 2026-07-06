<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

require_once __DIR__ . '/../config.php';
}

$email = $_GET['email'] ?? null;

if (!$email) {
    echo json_encode(['avis' => []]);
    exit;
}

$stmt = $pdo->prepare("SELECT ID_LOCATAIRE FROM locataire WHERE ADRESSE_EMAIL_LOC = ?");
$stmt->execute([$email]);
$loc = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$loc) {
    echo json_encode(['avis' => []]);
    exit;
}

$locId = $loc['ID_LOCATAIRE'];

// Get all lodging IDs that have avis
$stmt = $pdo->prepare("SELECT DISTINCT ID_LOGEMENT FROM avis_logement WHERE ID_LOCATAIRE = ?");
$stmt->execute([$locId]);
$logementAvis = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT DISTINCT ID_ATTRACTION FROM avis_attraction WHERE ID_LOCATAIRE = ?");
$stmt->execute([$locId]);
$attractionAvis = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT DISTINCT ID_EVENEMENT FROM avis_evenement WHERE ID_LOCATAIRE = ?");
$stmt->execute([$locId]);
$evenementAvis = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode([
    'success' => true,
    'avis' => [
        'logement' => array_column($logementAvis, 'ID_LOGEMENT'),
        'attraction' => array_column($attractionAvis, 'ID_ATTRACTION'),
        'evenement' => array_column($evenementAvis, 'ID_EVENEMENT')
    ]
]);