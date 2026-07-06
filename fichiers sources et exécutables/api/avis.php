<?php
require_once __DIR__ . '/../config.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$type = $_GET['type'] ?? null;
$filter = $_GET['filter'] ?? null;

if ($type === 'logement_ratings') {
    $stmt = $pdo->query("SELECT ID_LOGEMENT, ROUND(AVG(NOTE_GLOBALE_LOG),1) as avg_note, COUNT(*) as count FROM avis_logement GROUP BY ID_LOGEMENT");
    $ratings = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $result = [];
    foreach ($ratings as $r) {
        $result[$r['ID_LOGEMENT']] = [
            'avg' => (float)$r['avg_note'],
            'count' => (int)$r['count']
        ];
    }
    
    echo json_encode([
        'success' => true,
        'ratings' => $result
    ]);
    exit;
}

if ($type === 'logement') {
    $sql = "SELECT a.ID_AVIS, a.ID_LOGEMENT, a.NOTE_GLOBALE_LOG, a.CONTENU_LOG, a.TITRE_LOG as avis_titre, a.ID_LOCATAIRE,
           l.TITRE_LOG as nom_logement, l.TYPE_LOG as categorie, l.VILLE_LOG,
           loc.PRENOM_LOC, loc.NOM_LOC
           FROM avis_logement a 
           JOIN logement l ON a.ID_LOGEMENT = l.ID_LOGEMENT
           LEFT JOIN locataire loc ON a.ID_LOCATAIRE = loc.ID_LOCATAIRE";
    $params = [];
    
    if ($filter) {
        $sql .= " WHERE l.ID_LOGEMENT = ?";
        $params[] = $filter;
    }
    
    $sql .= " ORDER BY a.ID_AVIS DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $avis = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $result = [];
    foreach ($avis as $a) {
        $prenom = $a['PRENOM_LOC'] ?? '';
        $nom = $a['NOM_LOC'] ?? '';
        $result[] = [
            'id_avis' => $a['ID_AVIS'],
            'id_logement' => $a['ID_LOGEMENT'],
            'note_globale_log' => $a['NOTE_GLOBALE_LOG'],
            'contenu_log' => $a['CONTENU_LOG'],
            'titre_log' => $a['avis_titre'],
            
            'nom_logement' => $a['nom_logement'],
            'ville_log' => $a['VILLE_LOG'],
            'categorie' => $a['categorie'],
            'prenom_locataire' => $prenom,
            'nom_locataire' => $nom
        ];
    }
    
    echo json_encode([
        'success' => true,
        'avis' => $result
    ]);
    exit;
}

if ($type === 'evenement') {
    $sql = "SELECT a.ID_AVIS, a.ID_EVENEMENT, a.NOTE_GLOBALE_EV, a.CONTENU_EV, a.ID_LOCATAIRE,
           e.NOM_EVENEMENT,
           loc.PRENOM_LOC, loc.NOM_LOC
           FROM avis_evenement a 
           LEFT JOIN evenement e ON a.ID_EVENEMENT = e.ID_EVENEMENT
           LEFT JOIN locataire loc ON a.ID_LOCATAIRE = loc.ID_LOCATAIRE";
    $params = [];
    
    $sql .= " ORDER BY a.ID_AVIS DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $avis = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $result = [];
    foreach ($avis as $a) {
        $prenom = $a['PRENOM_LOC'] ?? '';
        $nom = $a['NOM_LOC'] ?? '';
        $result[] = [
            'id_avis' => $a['ID_AVIS'],
            'id_evenement' => $a['ID_EVENEMENT'],
            'note_globale_ev' => $a['NOTE_GLOBALE_EV'],
            'contenu' => $a['CONTENU_EV'],
            'nom_evenement' => $a['NOM_EVENEMENT'],
            'prenom_locataire' => $prenom,
            'nom_locataire' => $nom
        ];
    }
    
    echo json_encode([
        'success' => true,
        'avis' => $result
    ]);
    exit;
}

if ($type === 'attraction') {
    $sql = "SELECT a.ID_AVIS_ATT, a.ID_ATTRACTION, a.NOTE_GLOBALE_ATT, a.CONTENU_ATT, a.ID_LOCATAIRE,
           at.NOM_ATTRACTION,
           loc.PRENOM_LOC, loc.NOM_LOC
           FROM avis_attraction a 
           JOIN attraction_et_reference at ON a.ID_ATTRACTION = at.ID_ATTRACTION
           LEFT JOIN locataire loc ON a.ID_LOCATAIRE = loc.ID_LOCATAIRE";
    $params = [];
    
    $sql .= " ORDER BY a.ID_AVIS_ATT DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $avis = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $result = [];
    foreach ($avis as $a) {
        $prenom = $a['PRENOM_LOC'] ?? '';
        $nom = $a['NOM_LOC'] ?? '';
        $result[] = [
            'id_avis_att' => $a['ID_AVIS_ATT'],
            'id_attraction' => $a['ID_ATTRACTION'],
            'note_globale_att' => $a['NOTE_GLOBALE_ATT'],
            'contenu_att' => $a['CONTENU_ATT'],
            'nom_attraction' => $a['NOM_ATTRACTION'],
            'prenom_locataire' => $prenom,
            'nom_locataire' => $nom
        ];
    }
    
    echo json_encode([
        'success' => true,
        'avis' => $result
    ]);
    exit;
}

echo json_encode(['error' => 'Type not found']);