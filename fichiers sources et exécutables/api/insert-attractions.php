<?php
require_once __DIR__ . '/../config.php';

header('Content-Type: application/json');

try {
    $attractions = [
        ['ATTR-101', 'Musée de Carthage', 'Musée des mosaïques romaines, incontournable à Carthage', 'Musée', 'Carthage', 'Carthage'],
        ['ATTR-102', 'Amphithéâtre de Carthage', 'Ruines romaines classées UNESCO', 'Site historique', 'Carthage', 'Carthage'],
        ['ATTR-103', 'Parc du Belvédère', 'Plus grand parc urbain de Tunis avec vue sur la ville', 'Parc', 'Tunis', 'Tunis'],
        ['ATTR-104', 'Café Sidi Bou Saïd', 'Café emblématique blanc et bleu, vue mer exceptionnelle', 'Café', 'Sidi Bou Saïd', 'Sidi Bou Saïd'],
        ['ATTR-105', 'Boutiques blanches', 'Maisons bleues et blanches typiques du village', 'Village', 'Sidi Bou Saïd', 'Sidi Bou Saïd'],
        ['ATTR-106', 'Médina de Hammamet', 'Ancienne médina fortifiée, artisanale locale', 'Médina', 'Hammamet', 'Hammamet'],
        ['ATTR-107', 'Plage de Hammamet', 'Plage de sable fin, eaux transparentes', 'Plage', 'Hammamet', 'Hammamet'],
        ['ATTR-108', 'Kasbah de Hammamet', 'Forteresse historique avec vue mer', 'Kasbah', 'Hammamet', 'Hammamet'],
        ['ATTR-109', 'Plage de Djerba', 'Plage paradisiaque, eaux turquoise', 'Plage', 'Djerba', 'Djerba'],
        ['ATTR-110', 'Golf de Djerba', 'Parcours 18 trous avec vue mer', 'Golf', 'Djerba', 'Djerba'],
        ['ATTR-111', 'Synagogue de la Ghriba', 'Plus ancienne synagogue dAfrique', 'Religion', 'Djerba', 'Djerba'],
        ['ATTR-112', 'Médina de Sousse', 'Patrimoine UNESCO, ribat historique', 'Médina', 'Sousse', 'Sousse'],
        ['ATTR-113', 'Ribat de Sousse', 'Forteresse médiévale en bord de mer', 'Site historique', 'Sousse', 'Sousse'],
        ['ATTR-114', 'Souk de Sousse', 'Marché traditionnel authentique', 'Souk', 'Sousse', 'Sousse'],
        ['ATTR-115', 'Médina de Tunis', 'Vieux Tunis, souks et mosquées', 'Médina', 'Tunis', 'Tunis'],
        ['ATTR-116', 'Musée du Bardo', 'Plus grand musée de mosaïques au monde', 'Musée', 'Tunis', 'Tunis'],
        ['ATTR-117', 'Ribat de Monastir', 'Monument historique emblématique', 'Site historique', 'Monastir', 'Monastir'],
        ['ATTR-118', 'Mausolée de Bourguiba', 'Tombeau du premier président', 'Mausolée', 'Monastir', 'Monastir'],
        ['ATTR-119', 'Plage de Monastir', 'Plage familiales aux eaux calmes', 'Plage', 'Monastir', 'Monastir'],
        ['ATTR-120', 'Plage de La Marsa', 'Plage branchée avec bars et restaurants', 'Plage', 'La Marsa', 'La Marsa'],
        ['ATTR-121', 'Golf de La Marsa', 'Parcours prestige près de Tunis', 'Golf', 'La Marsa', 'La Marsa'],
    ];
    
    $stmt = $pdo->prepare("INSERT IGNORE INTO attraction_et_reference (ID_ATTRACTION, NOM_ATTRACTION, DESCRIPTION, TYPE_ATT, LOCALISATION, VILLE_ATT) VALUES (?, ?, ?, ?, ?, ?)");
    
    $inserted = 0;
    foreach ($attractions as $a) {
        try {
            $stmt->execute($a);
            $inserted++;
        } catch (PDOException $e) {
        }
    }
    
    echo json_encode(['success' => true, 'inserted' => $inserted]);
    
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}