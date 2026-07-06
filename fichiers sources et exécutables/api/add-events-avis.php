<?php
require_once __DIR__ . '/../config.php';

// First add events that match the data
$events = [
    ['EV-1', 'Festival international de Carthage', 'Course internationale traversant la ville', 'Sport', 'Amphitheatre de Carthage', 30, 150, '2026-04-25', '2026-04-25', 'Tunis'],
    ['EV-2', 'Marathon international de Tunis', 'Plus grand festival culturel tunisien avec spectacles et concerts', 'Culture', 'Tunis', 50, 50, '2026-07-01', '2026-08-15', 'Tunis'],
    ['EV-3', 'Festival culturel de Djerba', 'Festival estival avec animations et spectacle', 'Culture', 'Houmt Souk', 15, 40, '2026-08-01', '2026-08-10', 'Medenine'],
    ['EV-4', 'Festival international de Hammamet', "Festival d'été avec theatre et musique", 'Art', 'Theatre de Hammamet', 25, 80, '2026-07-10', '2026-08-20', 'Nabeul'],
    ['EV-5', 'Festival des déserts', 'Festival de musique du désert', 'Musique', 'Tozeur', 20, 60, '2026-12-20', '2027-01-05', 'Tozeur'],
    ['EV-6', 'Festival des medinas', "Festival dédié aux traditions et artisanale", 'Culture', 'Medina de Sousse', 15, 40, '2026-05-15', '2026-05-25', 'Sousse'],
    ['EV-7', 'Festival du heritage', "Festival d'artisanat et de culture", 'Art', 'Kairouan', 10, 25, '2026-03-01', '2026-03-10', 'Kairouan'],
];

$stmtEvent = $pdo->prepare("INSERT IGNORE INTO evenement (ID_EVENEMENT, NOM_EVENEMENT, DESCRIPTION, TYPE_EVENEMENT, LIEU_EVENEMENT, PRIX_MIN_BILLET, PRIX_MAX_BILLET, DATE_DEB_EV, DATE_FIN_EV, VILLE_EV) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

foreach ($events as $e) {
    $stmtEvent->execute($e);
}

echo "Added " . count($events) . " events\n";

// Now add event reviews
$evAvis = [
    [1, 1, 'EV-1', 5, 'Festival magnifique, ambiance exceptionnelle!'],
    [2, 2, 'EV-2', 4, 'Course internationale très intéressante'],
    [3, 3, 'EV-3', 5, 'Excellent festival, recommande!'],
    [4, 4, 'EV-4', 4, 'Très bonne ambiance artistique'],
    [5, 5, 'EV-5', 5, 'Expérience inoubliable dans le désert'],
];

$stmtEv = $pdo->prepare("INSERT IGNORE INTO avis_evenement (ID_AVIS, ID_LOCATAIRE, ID_EVENEMENT, NOTE_GLOBALE_EV, CONTENU_EV) VALUES (?, ?, ?, ?, ?)");
foreach ($evAvis as $e) {
    $stmtEv->execute($e);
}

echo "Added " . count($evAvis) . " event reviews\n";

echo "Done";