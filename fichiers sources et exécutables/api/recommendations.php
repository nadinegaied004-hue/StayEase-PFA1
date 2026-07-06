<?php
require_once __DIR__ . '/../config.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    try {
        $data = json_decode(file_get_contents('php://input'), true);
        
        if (!$data || !isset($data['type'])) {
            echo json_encode(['success' => false, 'error' => 'Données invalides']);
            exit;
        }
        
        $hotelId = $data['id_logement'] ?? null;
        $hotelVille = '';
        
        if ($hotelId) {
            $stmtVille = $pdo->prepare("SELECT VILLE_LOG FROM logement WHERE ID_LOGEMENT = ?");
            $stmtVille->execute([$hotelId]);
            $logement = $stmtVille->fetch();
            if ($logement) {
                $hotelVille = $logement['VILLE_LOG'];
            }
        }
        
        $ville = !empty($data['ville']) ? $data['ville'] : $hotelVille;
        
        if ($data['type'] === 'attraction') {
            $nom = $data['nom'] ?? '';
            $description = $data['description'] ?? '';
            $type = $data['type_attraction'] ?? '';
            $localisation = $data['localisation'] ?? $ville;
            $userId = $data['user_id'] ?? null;
            
            if (empty($nom)) {
                echo json_encode(['success' => false, 'error' => 'Le nom est requis']);
                exit;
            }
            
            $checkStmt = $pdo->prepare("SELECT ID_ATTRACTION FROM attraction_et_reference WHERE NOM_ATTRACTION = ?");
            $checkStmt->execute([$nom]);
            
            if ($checkStmt->fetch()) {
                echo json_encode(['success' => true, 'message' => 'Attraction déjà existante', 'exists' => true]);
                exit;
            }
            
            $id = 'ATTR-' . strtoupper(substr(uniqid(), -6));
            $userId = $data['user_id'] ?? null;
            $image = $data['image'] ?? '';
            $stmt = $pdo->prepare("INSERT INTO attraction_et_reference (ID_ATTRACTION, NOM_ATTRACTION, DESCRIPTION, TYPE_ATT, LOCALISATION, VILLE_ATT, IMAGE_ATTR, added_by) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$id, $nom, $description, $type, $localisation, $ville, $image, $userId]);
            
            echo json_encode(['success' => true, 'message' => 'Attraction ajoutée avec succès', 'id' => $id, 'ville' => $ville]);
            
        } elseif ($data['type'] === 'evenement') {
            $nom = $data['nom'] ?? '';
            $type = $data['type_evenement'] ?? '';
            $description = $data['description'] ?? '';
            $lieu = $data['lieu'] ?? '';
            $prixMin = $data['prix_min'] ?? null;
            $prixMax = $data['prix_max'] ?? null;
            $dateDebut = $data['date_debut'] ?? '';
            $dateFin = $data['date_fin'] ?? '';
            
            if (empty($nom)) {
                echo json_encode(['success' => false, 'error' => 'Le nom est requis']);
                exit;
            }
            
            $checkStmt = $pdo->prepare("SELECT ID_EVENEMENT FROM evenement WHERE NOM_EVENEMENT = ?");
            $checkStmt->execute([$nom]);
            
            if ($checkStmt->fetch()) {
                echo json_encode(['success' => true, 'message' => 'Evénement déjà existant', 'exists' => true]);
                exit;
            }
            
            $id = 'EVT-' . strtoupper(substr(uniqid(), -6));
            $userId = $data['user_id'] ?? null;
            $stmt = $pdo->prepare("INSERT INTO evenement (ID_EVENEMENT, NOM_EVENEMENT, TYPE_EVENEMENT, DESCRIPTION, LIEU_EVENEMENT, PRIX_MIN_BILLET, PRIX_MAX_BILLET, DATE_DEB_EV, DATE_FIN_EV, VILLE_EV, added_by) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$id, $nom, $type, $description, $lieu, $prixMin, $prixMax, $dateDebut, $dateFin, $ville, $userId]);
            
            echo json_encode(['success' => true, 'message' => 'Evénement ajouté avec succès', 'id' => $id, 'ville' => $ville]);
        }
        
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['success' => false, 'error' => 'Erreur de base de données']);
    }
} elseif ($method === 'PUT') {
    try {
        $data = json_decode(file_get_contents('php://input'), true);
        
        if (!$data || !isset($data['type']) || !isset($data['id'])) {
            echo json_encode(['success' => false, 'error' => 'Données invalides']);
            exit;
        }
        
        if ($data['type'] === 'attraction') {
            $stmt = $pdo->prepare("UPDATE attraction_et_reference SET NOM_ATTRACTION = ?, DESCRIPTION = ?, TYPE_ATT = ?, LOCALISATION = ?, VILLE_ATT = ? WHERE ID_ATTRACTION = ?");
            $stmt->execute([
                $data['nom'],
                $data['description'] ?? '',
                $data['type_attraction'] ?? '',
                $data['localisation'] ?? '',
                $data['ville'] ?? '',
                $data['id']
            ]);
            echo json_encode(['success' => true, 'message' => 'Attraction mise à jour']);
            
        } elseif ($data['type'] === 'evenement') {
            $stmt = $pdo->prepare("UPDATE evenement SET NOM_EVENEMENT = ?, TYPE_EVENEMENT = ?, DESCRIPTION = ?, LIEU_EVENEMENT = ?, PRIX_MIN_BILLET = ?, PRIX_MAX_BILLET = ?, DATE_DEB_EV = ?, DATE_FIN_EV = ?, VILLE_EV = ? WHERE ID_EVENEMENT = ?");
            $stmt->execute([
                $data['nom'],
                $data['type_evenement'] ?? '',
                $data['description'] ?? '',
                $data['lieu'] ?? '',
                $data['prix_min'] ?? null,
                $data['prix_max'] ?? null,
                $data['date_debut'] ?? '',
                $data['date_fin'] ?? '',
                $data['ville'] ?? '',
                $data['id']
            ]);
            echo json_encode(['success' => true, 'message' => 'Evénement mis à jour']);
        }
        
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['success' => false, 'error' => 'Erreur de base de données']);
    }
} elseif ($method === 'DELETE') {
    try {
        $data = json_decode(file_get_contents('php://input'), true);
        
        if (!$data || !isset($data['type']) || !isset($data['id'])) {
            echo json_encode(['success' => false, 'error' => 'Données invalides']);
            exit;
        }
        
        $userId = $data['user_id'] ?? null;
        if (!$userId) {
            echo json_encode(['success' => false, 'error' => 'Utilisateur non connecté']);
            exit;
        }
        
        if ($data['type'] === 'attraction') {
            $stmt = $pdo->prepare("DELETE FROM attraction_et_reference WHERE ID_ATTRACTION = ? AND added_by = ?");
            $stmt->execute([$data['id'], $userId]);
            echo json_encode(['success' => true, 'message' => 'Attraction supprimée']);
            
        } elseif ($data['type'] === 'evenement') {
            $stmt = $pdo->prepare("DELETE FROM evenement WHERE ID_EVENEMENT = ? AND added_by = ?");
            $stmt->execute([$data['id'], $userId]);
            echo json_encode(['success' => true, 'message' => 'Evénement supprimé']);
        }
        
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['success' => false, 'error' => 'Erreur de base de données']);
    }
} elseif ($method === 'GET') {
    try {
        $userId = $_GET['user_id'] ?? null;
        
        if (!$userId) {
            echo json_encode(['success' => false, 'error' => 'Utilisateur non identifié']);
            exit;
        }
        
        $attractions = [];
        $stmtAtt = $pdo->prepare("SELECT * FROM attraction_et_reference WHERE added_by = ?");
        $stmtAtt->execute([$userId]);
        while ($a = $stmtAtt->fetch(PDO::FETCH_ASSOC)) {
            $attractions[] = [
                'id' => $a['ID_ATTRACTION'],
                'nom' => $a['NOM_ATTRACTION'],
                'description' => $a['DESCRIPTION'],
                'type' => $a['TYPE_ATT'],
                'localisation' => $a['LOCALISATION'],
                'ville' => $a['VILLE_ATT']
            ];
        }
        
        $evenements = [];
        $stmtEv = $pdo->prepare("SELECT * FROM evenement WHERE added_by = ?");
        $stmtEv->execute([$userId]);
        while ($e = $stmtEv->fetch(PDO::FETCH_ASSOC)) {
            $evenements[] = [
                'id' => $e['ID_EVENEMENT'],
                'nom' => $e['NOM_EVENEMENT'],
                'type' => $e['TYPE_EVENEMENT'],
                'description' => $e['DESCRIPTION'],
                'lieu' => $e['LIEU_EVENEMENT'],
                'prix_min' => (float)$e['PRIX_MIN_BILLET'],
                'prix_max' => (float)$e['PRIX_MAX_BILLET'],
                'date_debut' => $e['DATE_DEB_EV'],
                'date_fin' => $e['DATE_FIN_EV'],
                'ville' => $e['VILLE_EV']
            ];
        }
        
        echo json_encode([
            'success' => true,
            'attractions' => $attractions,
            'evenements' => $evenements
        ]);
        
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['success' => false, 'error' => 'Erreur de base de données']);
    }
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Méthode non autorisée']);
}