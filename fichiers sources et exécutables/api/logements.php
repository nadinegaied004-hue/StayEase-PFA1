<?php
require_once __DIR__ . '/../config.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    $categorie = $_GET['categorie'] ?? null;
    $ville = $_GET['ville'] ?? null;
    $saison = $_GET['saison'] ?? null;
    $evenement = $_GET['evenement'] ?? null;
    $attraction = $_GET['attraction'] ?? null;
    $search = $_GET['search'] ?? null;
    $sortBy = $_GET['sortBy'] ?? 'ID_LOGEMENT';
    $sortOrder = $_GET['sortOrder'] ?? 'ASC';
    
    $categorieMap = [
        'Hôtel' => 'hotel',
        'Maison' => 'maison',
        'Maison d\'hôtes' => 'maison_hotes',
        'Ferme' => 'ferme'
    ];
    
    $categorieReverseMap = [
        'hotel' => 'Hôtel',
        'maison' => 'Maison',
        'maison_hotes' => 'Maison d\'hôtes',
        'ferme' => 'Ferme'
    ];
    
    $sortColumnMap = [
        'SCORE' => 'NOTE_MOYENNE',
        'NB_AVIS' => 'NB_AVIS',
        'TYPE_LOG' => 'TYPE_LOG',
        'VILLE_LOG' => 'VILLE_LOG',
        'PRIX_LOG' => 'PRIX_LOG'
    ];
    $sortBy = $sortColumnMap[$sortBy] ?? 'ID_LOGEMENT';
    
    $allowedSorts = ['ID_LOGEMENT', 'NOTE_MOYENNE', 'NB_AVIS', 'TYPE_LOG', 'VILLE_LOG', 'PRIX_LOG'];
    if (!in_array($sortBy, $allowedSorts)) $sortBy = 'ID_LOGEMENT';
    $sortOrder = strtoupper($sortOrder) === 'DESC' ? 'DESC' : 'ASC';
    
    $params = [];
    
    $sql = "SELECT l.*, 
                p.NOM_PROP,
                p.PRENOM_PROP,
                (SELECT ROUND(AVG(NOTE_GLOBALE_LOG), 1) FROM avis_logement WHERE ID_LOGEMENT = l.ID_LOGEMENT) as avg_score,
                (SELECT COUNT(*) FROM avis_logement WHERE ID_LOGEMENT = l.ID_LOGEMENT) as avis_count,
                GROUP_CONCAT(DISTINCT a.NOM_ATTRACTION SEPARATOR '|||') as attractions_list,
                GROUP_CONCAT(DISTINCT a.LOCALISATION SEPARATOR '|||') as attractions_localisation,
                GROUP_CONCAT(DISTINCT a.DESCRIPTION SEPARATOR '|||') as attractions_description,
                GROUP_CONCAT(DISTINCT a.IMAGE_ATTR SEPARATOR '|||') as attractions_image,
                GROUP_CONCAT(DISTINCT a.DISTANCE_KM SEPARATOR '|||') as attractions_distance,
                GROUP_CONCAT(DISTINCT e.NOM_EVENEMENT SEPARATOR '|||') as evenements_list,
                GROUP_CONCAT(DISTINCT CONCAT(e.DATE_DEB_EV, '->', e.DATE_FIN_EV) SEPARATOR '|||') as evenements_dates,
                GROUP_CONCAT(DISTINCT e.DESCRIPTION SEPARATOR '|||') as evenements_desc,
                GROUP_CONCAT(DISTINCT e.LIEU_EVENEMENT SEPARATOR '|||') as evenements_lieu,
                GROUP_CONCAT(DISTINCT CONCAT(e.PRIX_MIN_BILLET, '-', e.PRIX_MAX_BILLET) SEPARATOR '|||') as evenements_prix
            FROM logement l 
            LEFT JOIN proprietaire p ON l.ID_PROPRIETAIRE = p.ID_PROPRIETAIRE
            LEFT JOIN attraction_et_reference a ON a.LOCALISATION = l.VILLE_LOG OR a.VILLE_ATT = l.VILLE_LOG
            LEFT JOIN evenement e ON e.VILLE_EV = l.VILLE_LOG
            WHERE (l.STATUT_LOG = 'disponible' OR l.STATUT_LOG IS NULL)";
    
    if ($categorie && isset($categorieMap[$categorie])) {
        $sql .= " AND l.TYPE_LOG = ?";
        $params[] = $categorieMap[$categorie];
    }
    if ($ville) {
        $sql .= " AND l.VILLE_LOG = ?";
        $params[] = $ville;
    }
    if ($saison) {
        $sql .= " AND l.SAISON = ?";
        $params[] = $saison;
    }
    if ($evenement) {
        $sql .= " AND e.NOM_EVENEMENT = ?";
        $params[] = $evenement;
    }
    if ($attraction) {
        $sql .= " AND a.NOM_ATTRACTION = ?";
        $params[] = $attraction;
    }
    if ($search) {
        $sql .= " AND (l.TITRE_LOG LIKE ? OR l.DESCRIPTION_LOGEMENT LIKE ? OR l.VILLE_LOG LIKE ?)";
        $params[] = "%$search%";
        $params[] = "%$search%";
        $params[] = "%$search%";
    }
    
    $sql .= " GROUP BY l.ID_LOGEMENT ORDER BY l.$sortBy $sortOrder";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $logements = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $coordsMap = [
        'Tunis' => '36.8065,10.1815',
        'Nabeul' => '36.4500,10.6333',
        'Médenine' => '33.3500,10.5000',
        'Tozeur' => '33.9200,8.1000',
        'Monastir' => '35.7643,10.8113',
        'Sousse' => '35.8254,10.6368',
        'Sfax' => '34.7400,10.7600',
        'Kairouan' => '35.6800,9.9400',
        'Bizerte' => '37.2744,9.8739',
        'Ariana' => '36.8600,10.1900',
        'Ben Arous' => '36.7200,10.2200'
    ];
    
    $result = [];
    foreach ($logements as $l) {
        $coordsStr = $coordsMap[$l['VILLE_LOG']] ?? '36.8065,10.1815';
        $coords = explode(',', $coordsStr);
        
        $attractionsList = [];
        if (!empty($l['attractions_list'])) {
            $names = explode('|||', $l['attractions_list']);
            $locs = explode('|||', $l['attractions_localisation']);
            $descs = explode('|||', $l['attractions_description'] ?? '');
            $imgs = explode('|||', $l['attractions_image'] ?? '');
            $dists = explode('|||', $l['attractions_distance'] ?? '');
            foreach ($names as $i => $n) {
                $imgPath = $imgs[$i] ?? '';
                if (!empty($imgPath) && strpos($imgPath, 'http') !== 0) {
                    $imgPath = $imgPath;
                }
                $attractionsList[] = [
                    'nom' => $n, 
                    'localisation' => $locs[$i] ?? '',
                    'description' => $descs[$i] ?? '',
                    'image' => $imgPath,
                    'distance' => isset($dists[$i]) ? (float)$dists[$i] : 0
                ];
            }
        }
        
        $evenementsList = [];
        if (!empty($l['evenements_list'])) {
            $evts = explode('|||', $l['evenements_list']);
            $evDates = explode('|||', $l['evenements_dates'] ?? '');
            $evDesc = explode('|||', $l['evenements_desc'] ?? '');
            $evLieu = explode('|||', $l['evenements_lieu'] ?? '');
            $evPrix = explode('|||', $l['evenements_prix'] ?? '');
            foreach ($evts as $i => $e) {
                $datesParts = isset($evDates[$i]) ? explode('->', $evDates[$i]) : [];
                $prixParts = isset($evPrix[$i]) ? explode('-', $evPrix[$i]) : [];
                $evenementsList[] = [
                    'nom' => $e, 
                    'date_debut' => $datesParts[0] ?? '',
                    'date_fin' => $datesParts[1] ?? '',
                    'description' => $evDesc[$i] ?? '',
                    'lieu' => $evLieu[$i] ?? '',
                    'prix_min' => $prixParts[0] ?? '',
                    'prix_max' => $prixParts[1] ?? ''
                ];
            }
        }
        
        $dbType = $l['TYPE_LOG'] ?? 'hotel';
        $displayCategorie = $categorieReverseMap[$dbType] ?? 'Hôtel';
        
        $result[] = [
            'id_logement' => (int)$l['ID_LOGEMENT'],
            'nom' => $l['TITRE_LOG'] ?? ($displayCategorie . ' à ' . $l['VILLE_LOG']),
            'categorie' => $displayCategorie,
            'description' => $l['DESCRIPTION_LOGEMENT'] ?? '',
            'adresse' => $l['ADRESSE_LOG'] ?? '',
            'saison' => $l['SAISON'] ?? '',
            'motivation' => ' Vue mer | ' . $displayCategorie . ' premium',
            'score' => round((float)$l['avg_score'], 1) ?: 0,
            'nb_avis' => (int)$l['avis_count'] ?: 0,
            'ville' => $l['VILLE_LOG'] ?? '',
            'lat' => isset($coords[0]) ? (float)$coords[0] : 36.8065,
            'lng' => isset($coords[1]) ? (float)$coords[1] : 10.1815,
            'proprietaire' => ($l['PRENOM_PROP'] ?? '') . ' ' . ($l['NOM_PROP'] ?? ''),
            'images' => $l['IMAGE_PRINCIPALE'] ? [$l['IMAGE_PRINCIPALE']] : [],
            'image' => $l['IMAGE_PRINCIPALE'] ? $l['IMAGE_PRINCIPALE'] : '',
            'datesDisponibles' => [],
            'dates_evenements' => [],
            'evenements' => $evenementsList,
            'attractions' => $attractionsList
        ];
    }
    
    echo json_encode([
        'success' => true,
        'logements' => $result,
        'total' => count($result)
    ]);
    
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Méthode non autorisée']);
}