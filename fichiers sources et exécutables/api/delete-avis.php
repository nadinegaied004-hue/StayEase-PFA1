<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

require_once __DIR__ . '/../config.php';
    echo json_encode(['success' => false, 'error' => 'Database connection failed']);
    exit;
}

$type = $_GET['type'] ?? null;
$id = $_GET['id'] ?? null;

if (!$type || !$id) {
    echo json_encode(['success' => false, 'error' => 'Missing parameters']);
    exit;
}

try {
    $response = ['success' => true];
    
    if ($type === 'logement') {
        $stmt = $pdo->prepare("SELECT id_logement FROM avis_logement WHERE id_avis = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $response['id_logement'] = $row['id_logement'] ?? null;
        
        $stmt = $pdo->prepare("DELETE FROM avis_logement WHERE id_avis = ?");
        $stmt->execute([$id]);
    } elseif ($type === 'evenement') {
        $stmt = $pdo->prepare("SELECT id_evenement FROM avis_evenement WHERE id_avis = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $response['id_evenement'] = $row['id_evenement'] ?? null;
        
        $stmt = $pdo->prepare("DELETE FROM avis_evenement WHERE id_avis = ?");
        $stmt->execute([$id]);
    } elseif ($type === 'attraction') {
        $stmt = $pdo->prepare("SELECT id_attraction FROM avis_attraction WHERE id_avis_att = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $response['id_attraction'] = $row['id_attraction'] ?? null;
        
        $stmt = $pdo->prepare("DELETE FROM avis_attraction WHERE id_avis_att = ?");
        $stmt->execute([$id]);
    }
    
    echo json_encode($response);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}