<?php
require_once __DIR__ . '/../config.php';

header('Content-Type: application/json');

try {
    $evenements = [
        ['EVT-001', 'Festival International de Carthage', 'Festival', 'Plus grand festival culturel de Méditerranée, musique, théâtre, danse.', 'Carthage', 30, 120, '2026-07-01', '2026-08-15', 'Carthage'],
        ['EVT-002', 'Festival de Hammamet', 'Festival', 'Festival international de musique et théâtre.', 'Hammamet', 25, 80, '2026-07-01', '2026-08-15', 'Hammamet'],
        ['EVT-003', 'Festival des在后岛屿', 'Festival', 'Festival folklorique authentique de Djerba.', 'Djerba', 15, 50, '2026-08-10', '2026-08-20', 'Djerba'],
        ['EVT-004', 'Marathon de Tunis', 'Sport', 'Marathon international de Tunis.', 'Tunis', 20, 50, '2026-04-15', '2026-04-15', 'Tunis'],
        ['EVT-005', 'Fête de la Musique Sousse', 'Festival', ' concerts gratuits sur plusieurs scènes.', 'Sousse', 0, 0, '2026-06-21', '2026-06-21', 'Sousse'],
        ['EVT-006', 'Exposition d\'Art Contemporain', 'Exposition', 'Exposition d\'artistes tunisiens et internationaux.', 'Sidi Bou Saïd', 10, 30, '2026-05-01', '2026-05-30', 'Sidi Bou Saïd'],
        ['EVT-007', 'Festival de la Mer', 'Festival', 'Celebration maritime avec activités nautiques.', 'Monastir', 5, 25, '2026-07-15', '2026-07-20', 'Monastir'],
        ['EVT-008', 'Journées Culturelles de Kairouan', 'Culture', 'Découverte du patrimoine historique de Kairouan.', 'Kairouan', 15, 40, '2026-10-01', '2026-10-07', 'Kairouan'],
        ['EVT-009', 'Jazzablanca', 'Festival', 'Festival de jazz en bord de mer.', 'La Marsa', 30, 80, '2026-06-15', '2026-06-18', 'La Marsa'],
        ['EVT-010', 'Mawazine', 'Festival', 'Festival international de musique à Tabarka.', 'Tabarka', 20, 60, '2026-07-01', '2026-07-10', 'Tabarka'],
    ];
    
    $stmt = $pdo->prepare("INSERT IGNORE INTO evenement (ID_EVENEMENT, NOM_EVENEMENT, TYPE_EVENEMENT, DESCRIPTION, LIEU_EVENEMENT, PRIX_MIN_BILLET, PRIX_MAX_BILLET, DATE_DEB_EV, DATE_FIN_EV, VILLE_EV) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    $inserted = 0;
    foreach ($evenements as $e) {
        try {
            $stmt->execute($e);
            $inserted++;
        } catch (PDOException $ex) {
        }
    }
    
    echo json_encode(['success' => true, 'inserted' => $inserted]);
    
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}