<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

require_once __DIR__ . '/../config.php';

$logements = [
    1 => ['nom' => 'Hotel Carthage', 'desc' => 'Hotel 5 etoiles face a la mer avec vue sur la baie de Carthage, piscine exterieure et spa', 'adresse' => 'Avenue de la Marine', 'ville' => 'Tunis', 'prix' => 450, 'chambres' => 3, 'sdb' => 3, 'capacite' => 6, 'type' => 'hotel', 'equipements' => 'WiFi,Piscine,Spa,Restaurant,Parking,Climatisation', 'image' => 'images/photos logement/hotel carthage.jpg', 'saison' => 'haute saison'],
    2 => ['nom' => 'Hotel Sidi Bou Said', 'desc' => 'Maison dhotes traditionnelle avec vue panoramique sur la mer et les toits bleus du village', 'adresse' => 'Rue du village', 'ville' => 'Tunis', 'prix' => 280, 'chambres' => 4, 'sdb' => 3, 'capacite' => 8, 'type' => 'maison_hotes', 'equipements' => 'WiFi,Piscine,Petit dejeuner,Terrasse,Vue mer', 'image' => 'images/photos logement/hotel sidi Bousaid.jpg', 'saison' => 'haute saison'],
    3 => ['nom' => 'Hotel Djerba', 'desc' => 'Complexe hotelier face a la plage de Houmt Souk, ideal pour les familles', 'adresse' => 'Zone Touristique Houmt Souk', 'ville' => 'Medenine', 'prix' => 180, 'chambres' => 3, 'sdb' => 2, 'capacite' => 6, 'type' => 'hotel', 'equipements' => 'WiFi,Piscine,Plage,Animation,Club enfant', 'image' => 'images/photos logement/hotel djerba.jpg', 'saison' => 'haute saison'],
    4 => ['nom' => 'Hotel Jasmine Hammamet', 'desc' => 'Hotel 4 etoiles au centre de Hammamet, proche de la medina et des plages', 'adresse' => 'Zone Touristique', 'ville' => 'Nabeul', 'prix' => 220, 'chambres' => 2, 'sdb' => 2, 'capacite' => 4, 'type' => 'hotel', 'equipements' => 'WiFi,Piscine,Spa,Restaurant,Plage', 'image' => 'images/photos logement/hotel jasmine hammamet.jpg', 'saison' => 'haute saison'],
    5 => ['nom' => 'Ferme Biologique Tozeur', 'desc' => 'Ferme traditionnelle au milieu des palmiers, immersion totale dans le desert', 'adresse' => 'Route de Nefta', 'ville' => 'Tozeur', 'prix' => 95, 'chambres' => 2, 'sdb' => 1, 'capacite' => 4, 'type' => 'ferme', 'equipements' => 'WiFi,Restaurant bio,Visites oasis,Chameau', 'image' => 'images/photos logement/ferme biologique tozeur.webp', 'saison' => 'basse saison'],
    6 => ['nom' => 'Hotel Royal Salem Sousse', 'desc' => 'Hotel 4 etoiles centre ville avec vue sur le port de Sousse', 'adresse' => 'Boulevard du 14 Janvier', 'ville' => 'Sousse', 'prix' => 190, 'chambres' => 2, 'sdb' => 2, 'capacite' => 4, 'type' => 'hotel', 'equipements' => 'WiFi,Piscine,Spa,Golf,Restaurant', 'image' => 'images/photos logement/hotel royal salem sousse.jpg', 'saison' => 'haute saison'],
    7 => ['nom' => 'Maison Dhotes Medina Sousse', 'desc' => 'Maison dhotes authentique dans la medina de Sousse, proche du Ribat', 'adresse' => 'Rue de la Kasbah', 'ville' => 'Sousse', 'prix' => 130, 'chambres' => 2, 'sdb' => 1, 'capacite' => 4, 'type' => 'maison_hotes', 'equipements' => 'WiFi,Terrasse,Petit dejeuner,Cuisine', 'image' => 'images/photos logement/maison dhotes medina sousse.jpg', 'saison' => 'basse saison'],
    8 => ['nom' => 'Hotel Laico Tunis', 'desc' => 'Hotel 5 etoiles au centre de Tunis, proche du quartier des affaires', 'adresse' => 'Avenue Habib Bourguiba', 'ville' => 'Tunis', 'prix' => 350, 'chambres' => 2, 'sdb' => 2, 'capacite' => 4, 'type' => 'hotel', 'equipements' => 'WiFi,Piscine,Spa,Fitness,Restaurant', 'image' => 'images/photos logement/hotel laico tunis.jpg', 'saison' => 'haute saison'],
    9 => ['nom' => 'Maison Traditionnelle Kairouan', 'desc' => 'Maison traditionnelle proche de la Grande Mosquee, ideal pour decouvrir Kairouan', 'adresse' => 'Rue de la Mosquee', 'ville' => 'Kairouan', 'prix' => 80, 'chambres' => 3, 'sdb' => 2, 'capacite' => 6, 'type' => 'maison', 'equipements' => 'WiFi,Visites guidees,Petit dejeuner', 'image' => 'images/photos logement/maison traditionnelle kairouan.webp', 'saison' => 'basse saison'],
    10 => ['nom' => 'Villa Bord de Mer Bizerte', 'desc' => 'Maison de pecheur avec acces direct a la plage et vue sur le port', 'adresse' => 'Rue du Port', 'ville' => 'Bizerte', 'prix' => 110, 'chambres' => 2, 'sdb' => 1, 'capacite' => 4, 'type' => 'maison', 'equipements' => 'WiFi,Vue mer,Plage privee,Barbecue', 'image' => 'images/photos logement/villa bord de mer bizerte.webp', 'saison' => 'haute saison']
];

try {
    foreach ($logements as $id => $l) {
        $stmt = $pdo->prepare("UPDATE logement SET 
            TITRE_LOG = ?, DESCRIPTION_LOGEMENT = ?, ADRESSE_LOG = ?, VILLE_LOG = ?, PRIX_LOG = ?, 
            NB_CHAMBRES = ?, NB_SALLE_BAIN = ?, CAPACITE_MAX = ?, TYPE_LOG = ?, EQUIPEMENTS_LOG = ?, 
            IMAGE_PRINCIPALE = ?, STATUT_LOG = 'disponible', SAISON = ? 
            WHERE ID_LOGEMENT = ?");
        $stmt->execute([
            $l['nom'], $l['desc'], $l['adresse'], $l['ville'], $l['prix'],
            $l['chambres'], $l['sdb'], $l['capacite'], $l['type'], $l['equipements'],
            $l['image'], $l['saison'], $id
        ]);
    }
    echo json_encode(['success' => true, 'message' => 'Tous les logements ont été restaurés']);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}