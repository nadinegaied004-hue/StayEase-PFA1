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
$logementId = $data['logement_id'] ?? null;
$note = $data['note'] ?? 5;
$comment = $data['comment'] ?? '';
$email = $data['email'] ?? null;

if (!$type || !$logementId || !$email) {
    echo json_encode(['success' => false, 'error' => 'Missing parameters']);
    exit;
}

// Get user ID from email
$stmt = $pdo->prepare("SELECT ID_LOCATAIRE FROM locataire WHERE ADRESSE_EMAIL_LOC = ?");
$stmt->execute([$email]);
$loc = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$loc) {
    echo json_encode(['success' => false, 'error' => 'User not found']);
    exit;
}

$locId = $loc['ID_LOCATAIRE'];

try {
    if ($type === 'logement') {
        // Get next ID
        $stmt = $pdo->query("SELECT MAX(ID_AVIS) as max_id FROM avis_logement");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $newId = ($result['max_id'] ?? 0) + 1;
        
        $stmt = $pdo->prepare("INSERT INTO avis_logement (ID_AVIS, ID_LOCATAIRE, ID_LOGEMENT, NOTE_GLOBALE_LOG, CONTENU_LOG, DERNIERE_MAJ_LOG) VALUES (?, ?, ?, ?, ?, CURDATE())");
        $stmt->execute([$newId, $locId, $logementId, $note, $comment]);
        
        // Update NB_AVIS count in logement table
        $stmt = $pdo->prepare("UPDATE logement SET NB_AVIS = NB_AVIS + 1 WHERE ID_LOGEMENT = ?");
        $stmt->execute([$logementId]);
    } elseif ($type === 'attraction') {
        $attrId = $data['attraction_id'] ?? null;
        if (!$attrId) {
            echo json_encode(['success' => false, 'error' => 'Attraction ID missing']);
            exit;
        }
        
        // Check if user already reviewed this attraction
        $stmt = $pdo->prepare("SELECT ID_AVIS_ATT FROM avis_attraction WHERE ID_LOCATAIRE = ? AND ID_ATTRACTION = ?");
        $stmt->execute([$locId, $attrId]);
        if ($stmt->fetch()) {
            echo json_encode(['success' => false, 'error' => 'Vous avez déjà donné un avis pour cette attraction']);
            exit;
        }
        
        $stmt = $pdo->query("SELECT MAX(ID_AVIS_ATT) as max_id FROM avis_attraction");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $newId = ($result['max_id'] ?? 0) + 1;
        
        $stmt = $pdo->prepare("INSERT INTO avis_attraction (ID_AVIS_ATT, ID_LOCATAIRE, ID_ATTRACTION, NOTE_GLOBALE_ATT, CONTENU_ATT, DERNIERE_MAJ_ATT) VALUES (?, ?, ?, ?, ?, CURDATE())");
        $stmt->execute([$newId, $locId, $attrId, $note, $comment]);
    } elseif ($type === 'evenement') {
        $eventId = $data['evenement_id'] ?? null;
        if (!$eventId) {
            echo json_encode(['success' => false, 'error' => 'Evenement ID missing']);
            exit;
        }
        
        // Check if user already reviewed this event
        $stmt = $pdo->prepare("SELECT ID_AVIS FROM avis_evenement WHERE ID_LOCATAIRE = ? AND ID_EVENEMENT = ?");
        $stmt->execute([$locId, $eventId]);
        if ($stmt->fetch()) {
            echo json_encode(['success' => false, 'error' => 'Vous avez déjà donné un avis pour cet événement']);
            exit;
        }
        
        $stmt = $pdo->query("SELECT MAX(ID_AVIS) as max_id FROM avis_evenement");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $newId = ($result['max_id'] ?? 0) + 1;
        
        $stmt = $pdo->prepare("INSERT INTO avis_evenement (ID_AVIS, ID_LOCATAIRE, ID_EVENEMENT, NOTE_GLOBALE_EV, CONTENU_EV, DERNIERE_MAJ_EV) VALUES (?, ?, ?, ?, ?, CURDATE())");
        $stmt->execute([$newId, $locId, $eventId, $note, $comment]);
    }
    
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}