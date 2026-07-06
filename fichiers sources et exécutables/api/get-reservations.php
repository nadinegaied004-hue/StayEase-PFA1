<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

$user_id = isset($_GET['user_id']) ? intval($_GET['user_id']) : null;
$email = isset($_GET['email']) ? $_GET['email'] : null;

require_once __DIR__ . '/../config.php';

if ($email) {
    $stmt = $pdo->prepare("SELECT ID_LOCATAIRE FROM locataire WHERE ADRESSE_EMAIL_LOC = ?");
    $stmt->execute([$email]);
    $loc = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($loc) {
        $user_id = $loc['ID_LOCATAIRE'];
    }
}

if ($user_id === null) {
    echo json_encode(['success' => false, 'error' => 'User ID or email required']);
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT * FROM reservation WHERE ID_LOCATAIRE = ? AND STATUT = 'acceptee' ORDER BY DATE_DEB DESC");
    $stmt->execute([$user_id]);
    $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $result = [];
    foreach ($reservations as $res) {
        $logement_id = $res['ID_LOGEMENT'];
        
        $stmt2 = $pdo->prepare("SELECT TITRE_LOG, DESCRIPTION_LOGEMENT, VILLE_LOG, TYPE_LOG, IMAGE_PRINCIPALE FROM logement WHERE ID_LOGEMENT = ?");
        $stmt2->execute([$logement_id]);
        $logement = $stmt2->fetch(PDO::FETCH_ASSOC);
        
        $ville_log = $logement['VILLE_LOG'] ?? '';
        
        // Get attractions for this city
        $stmt3 = $pdo->prepare("SELECT ID_ATTRACTION, NOM_ATTRACTION, DESCRIPTION, TYPE_ATT, LOCALISATION, VILLE_ATT FROM attraction_et_reference WHERE VILLE_ATT = ? OR LOCALISATION = ? LIMIT 10");
        $stmt3->execute([$ville_log, $ville_log]);
        $attractions = $stmt3->fetchAll(PDO::FETCH_ASSOC);
        
        // Get events for this city
        $stmt4 = $pdo->prepare("SELECT ID_EVENEMENT, NOM_EVENEMENT, DESCRIPTION, TYPE_EVENEMENT, LIEU_EVENEMENT, DATE_DEB_EV, DATE_FIN_EV FROM evenement WHERE VILLE_EV = ? LIMIT 5");
        $stmt4->execute([$ville_log]);
        $evenements = $stmt4->fetchAll(PDO::FETCH_ASSOC);
        
        $result[] = [
            'id_reservation' => $res['ID_RESERVATION'],
            'id_logement' => $res['ID_LOGEMENT'],
            'date_debut' => $res['DATE_DEB'],
            'date_fin' => $res['DATE_FIN'],
            'statut' => $res['STATUT'],
            'logement_description' => $logement['DESCRIPTION_LOGEMENT'] ?? '',
            'nom_logement' => $logement['TITRE_LOG'] ?? '',
            'ville_log' => $ville_log,
            'type_log' => $logement['TYPE_LOG'] ?? '',
            'image_logement' => $logement['IMAGE_PRINCIPALE'] ?? '',
            'attractions' => $attractions,
            'evenements' => $evenements
        ];
    }
    
    echo json_encode([
        'success' => true,
        'reservations' => $result
    ]);
    
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>