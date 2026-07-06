<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

require_once __DIR__ . '/../config.php';

$input = file_get_contents('php://input');
$data = json_decode($input, true);

$userId = $data['user_id'] ?? null;
$nomLogement = $data['nom_logement'] ?? '';
$description = $data['description'] ?? '';
$photo = $data['photo'] ?? '';
$photos = $data['photos'] ?? [];
$attractions = $data['attractions'] ?? [];
$evenements = $data['evenements'] ?? [];

if (!$userId) {
    echo json_encode(['success' => false, 'error' => 'User ID missing']);
    exit;
}

try {
    $logementId = $data['logement_id'] ?? null;
    
    if ($logementId) {
        if (!empty($nomLogement)) {
            $stmt = $pdo->prepare("UPDATE logement SET TITRE_LOG = ? WHERE ID_LOGEMENT = ? AND ID_PROPRIETAIRE = ?");
            $stmt->execute([$nomLogement, $logementId, $userId]);
        }
        if (!empty($description)) {
            $stmt = $pdo->prepare("UPDATE logement SET DESCRIPTION_LOGEMENT = ? WHERE ID_LOGEMENT = ? AND ID_PROPRIETAIRE = ?");
            $stmt->execute([$description, $logementId, $userId]);
        }
        if (!empty($photo)) {
            $stmt = $pdo->prepare("UPDATE logement SET IMAGE_PRINCIPALE = ? WHERE ID_LOGEMENT = ? AND ID_PROPRIETAIRE = ?");
            $stmt->execute([$photo, $logementId, $userId]);
        }
    } else {
        if (!empty($nomLogement)) {
            $stmt = $pdo->prepare("UPDATE logement SET TITRE_LOG = ? WHERE ID_PROPRIETAIRE = ? LIMIT 1");
            $stmt->execute([$nomLogement, $userId]);
        }
        if (!empty($description)) {
            $stmt = $pdo->prepare("UPDATE logement SET DESCRIPTION_LOGEMENT = ? WHERE ID_PROPRIETAIRE = ? LIMIT 1");
            $stmt->execute([$description, $userId]);
        }
    }
    
    echo json_encode(['success' => true, 'message' => 'Logement mis à jour']);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}