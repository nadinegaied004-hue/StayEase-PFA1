<?php
require_once __DIR__ . '/../config.php';

try {
    $pdo->exec("CREATE TABLE IF NOT EXISTS avis_evenement (
        ID_AVIS INT PRIMARY KEY,
        ID_LOCATAIRE INT NOT NULL,
        ID_EVENEMENT VARCHAR(50) NOT NULL,
        NOTE_GLOBALE_EV INT CHECK(NOTE_GLOBALE_EV BETWEEN 1 AND 5),
        CONTENU_EV TEXT,
        FOREIGN KEY(ID_LOCATAIRE) REFERENCES locataire(ID_LOCATAIRE),
        FOREIGN KEY(ID_EVENEMENT) REFERENCES evenement(ID_EVENEMENT)
    ) ENGINE=InnoDB");
    echo "Table avis_evenement created\n";
} catch (PDOException $e) {
    echo $e->getMessage() . "\n";
}

// Add event reviews
$evAvis = [
    [1, 1, 'EV-1', 5, 'Festival magnifique, ambiance exceptionnelle!'],
    [2, 2, 'EV-2', 4, 'Course internationale très intéressante'],
    [3, 3, 'EV-3', 5, 'Marathon excellent organisation'],
];

$stmtEv = $pdo->prepare("INSERT IGNORE INTO avis_evenement (ID_AVIS, ID_LOCATAIRE, ID_EVENEMENT, NOTE_GLOBALE_EV, CONTENU_EV) VALUES (?, ?, ?, ?, ?)");
foreach ($evAvis as $e) {
    try {
        $stmtEv->execute($e);
    } catch (PDOException $ex) {
        // Event might not exist, skip
    }
}
echo "Done\n";