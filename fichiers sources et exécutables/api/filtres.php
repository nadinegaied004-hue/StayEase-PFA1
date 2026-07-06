<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

include 'db_connection.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    
    // Get evenements with new table
    $stmt = $conn->query("SELECT nom_evenement, date_evenement FROM evenement ORDER BY nom_evenement");
    $evenements = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Get attractions with new table
    $stmt = $conn->query("SELECT nom_attraction, distance FROM attraction ORDER BY nom_attraction");
    $attractions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Group events by month
    $eventsByMonth = [];
    foreach ($evenements as $e) {
        $month = date('M Y', strtotime($e['date_evenement']));
        if (!isset($eventsByMonth[$month])) {
            $eventsByMonth[$month] = [];
        }
        $eventsByMonth[$month][] = $e['nom_evenement'];
    }
    
    echo json_encode([
        'success' => true,
        'evenements' => $eventsByMonth,
        'attractions' => array_column($attractions, 'nom_attraction')
    ]);
    
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Méthode non autorisée']);
}
?>