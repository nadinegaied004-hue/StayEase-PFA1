<?php
header('Content-Type: application/json');

require_once __DIR__ . '/../config.php';

$updates = [
    'Musee du Bardo' => 'images/photos attraction/musée du bardo.webp',
    'Medina de Sousse' => 'images/photos attraction/medina de sousse.jpg',
    'Ribat de Monastir' => 'images/photos attraction/ribat de sousse.jpg',
    'Mausolee de Bourguiba' => 'images/photos attraction/ribat de sousse.jpg',
    'Musee de Sfax' => 'images/photos attraction/medina de sousse.jpg',
    'Grande Mosquee de Kairouan' => 'images/photos attraction/grande mosquee de kairouan.jpg',
    'Port de Bizerte' => 'images/photos attraction/port de bizerte.jpg',
    'Sites archeologiques de Carthage' => 'images/photos attraction/sites archeologiques de carthage.png',
];

foreach ($updates as $nom => $image) {
    $stmt = $pdo->prepare("UPDATE attraction_et_reference SET IMAGE_ATTR = ? WHERE NOM_ATTRACTION = ?");
    $stmt->execute([$image, $nom]);
}

echo json_encode(['success' => true, 'message' => 'Images corrigées']);