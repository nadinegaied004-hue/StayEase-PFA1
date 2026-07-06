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
        $stmt = $pdo->prepare("SELECT * FROM attraction_et_reference WHERE ID_ATTRACTION = ?");
        $stmt->execute([$id]);
        $attraction = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($attraction) {
            echo json_encode(['success' => true, 'attraction' => $attraction]);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Attraction non trouvée']);
        }
    } else {
        $sql = "SELECT * FROM attraction_et_reference WHERE 1=1";
        $params = [];
        
        if ($type) {
            $sql .= " AND TYPE_ATT = ?";
            $params[] = $type;
        }
        
        if ($ville) {
            $sql .= " AND LOCALISATION = ? OR VILLE_ATT = ?";
            $params[] = $ville;
            $params[] = $ville;
        }
        
        if ($nom) {
            $sql .= " AND NOM_ATTRACTION LIKE ?";
            $params[] = "%$nom%";
        }
        
        $sql .= " ORDER BY NOM_ATTRACTION ASC";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        
        $attractions = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $result = [];
        foreach ($attractions as $a) {
            $result[] = [
                'id' => $a['ID_ATTRACTION'],
                'nom' => $a['NOM_ATTRACTION'],
                'type' => $a['TYPE_ATT'],
                'description' => $a['DESCRIPTION'],
                'localisation' => $a['LOCALISATION'],
                'ville' => $a['VILLE_ATT'] ?? $a['LOCALISATION'],
                'image' => $a['IMAGE_ATTR'] ?? '',
                'distance' => $a['DISTANCE_KM'] ?? 0
            ];
        }
        
        echo json_encode(['success' => true, 'attractions' => $result, 'total' => count($result)]);
    }
    
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Méthode non autorisée']);
}