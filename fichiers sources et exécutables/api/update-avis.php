<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

require_once __DIR__ . '/../config.php';
    echo json_encode(['success' => false, 'error' => 'Database connection failed']);
    exit;
}

$input = file_get_contents('php://input');
$data = json_decode($input, true);

$type = $data['type'] ?? null;
$id = $data['id'] ?? null;
$contenu = $data['contenu'] ?? '';
$note = $data['note'] ?? 5;

if (!$type || !$id) {
    echo json_encode(['success' => false, 'error' => 'Missing parameters']);
    exit;
}

try {
    if ($type === 'logement') {
        $stmt = $pdo->prepare("UPDATE avis_logement SET contenu_log = ?, note_globale_log = ?, DERNIERE_MAJ_LOG = CURDATE() WHERE id_avis = ?");
        $stmt->execute([$contenu, $note, $id]);
    } elseif ($type === 'evenement') {
        $stmt = $pdo->prepare("UPDATE avis_evenement SET contenu = ?, note_globale_ev = ?, DERNIERE_MAJ_EV = CURDATE() WHERE id_avis = ?");
        $stmt->execute([$contenu, $note, $id]);
    } elseif ($type === 'attraction') {
        $stmt = $pdo->prepare("UPDATE avis_attraction SET contenu_att = ?, note_globale_att = ?, DERNIERE_MAJ_ATT = CURDATE() WHERE id_avis_att = ?");
        $stmt->execute([$contenu, $note, $id]);
    }
    
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}