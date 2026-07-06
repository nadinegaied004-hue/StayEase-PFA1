<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

require_once __DIR__ . '/../config.php';

$userId = $_GET['user_id'] ?? null;
$logementId = $_GET['logement_id'] ?? null;

if (!$userId) {
    echo json_encode(['success' => false, 'error' => 'User ID missing']);
    exit;
}

try {
    $sql = "SELECT * FROM logement WHERE ID_PROPRIETAIRE = ?";
$params = [$userId];

if ($logementId) {
    $sql .= " AND ID_LOGEMENT = ?";
    $params[] = $logementId;
}

$stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $logements = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if ($logements && count($logements) > 0) {
        $firstLogement = $logements[0];
        echo json_encode([
            'success' => true,
            'logement' => [
                'id' => $firstLogement['ID_LOGEMENT'],
                'nom_logement' => $firstLogement['TITRE_LOG'] ?? '',
                'description' => $firstLogement['DESCRIPTION_LOGEMENT'] ?? '',
                'images' => $firstLogement['IMAGE_PRINCIPALE'] ?? ''
            ],
            'logements' => array_map(function($l) {
                return [
                    'id' => $l['ID_LOGEMENT'],
                    'nom' => $l['TITRE_LOG']
                ];
            }, $logements)
        ]);
    } else {
        echo json_encode(['success' => true, 'logement' => null, 'logements' => []]);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}