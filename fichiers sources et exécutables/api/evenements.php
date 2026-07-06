<?php
require_once __DIR__ . '/../config.php';

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    $id = $_GET['id'] ?? null;
    $type = $_GET['type'] ?? null;
    $ville = $_GET['ville'] ?? null;
    $nom = $_GET['nom'] ?? null;
    
    if ($id) {
        $stmt = $pdo->prepare("SELECT * FROM evenement WHERE ID_EVENEMENT = ?");
        $stmt->execute([$id]);
        $evenement = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($evenement) {
            echo json_encode(['success' => true, 'evenement' => $evenement]);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Événement non trouvé']);
        }
    } else {
        $sql = "SELECT * FROM evenement WHERE 1=1";
        $params = [];
        
        if ($type) {
            $sql .= " AND TYPE_EVENEMENT = ?";
            $params[] = $type;
        }
        
        if ($ville) {
            $sql .= " AND VILLE_EV = ?";
            $params[] = $ville;
        }
        
        if ($nom) {
            $sql .= " AND NOM_EVENEMENT LIKE ?";
            $params[] = "%$nom%";
        }
        
        $sql .= " ORDER BY DATE_DEB_EV ASC";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        
        $evenements = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $result = [];
        foreach ($evenements as $e) {
            $result[] = [
                'id' => $e['ID_EVENEMENT'],
                'nom' => $e['NOM_EVENEMENT'],
                'type' => $e['TYPE_EVENEMENT'],
                'description' => $e['DESCRIPTION'],
                'lieu' => $e['LIEU_EVENEMENT'],
                'prix_min' => (float)$e['PRIX_MIN_BILLET'],
                'prix_max' => (float)$e['PRIX_MAX_BILLET'],
                'date_debut' => $e['DATE_DEB_EV'],
                'date_fin' => $e['DATE_FIN_EV'],
                'ville' => $e['VILLE_EV'],
                'image' => $e['IMAGE_EV'] ?? ''
            ];
        }
        
        echo json_encode(['success' => true, 'evenements' => $result, 'total' => count($result)]);
    }
    
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Méthode non autorisée']);
}