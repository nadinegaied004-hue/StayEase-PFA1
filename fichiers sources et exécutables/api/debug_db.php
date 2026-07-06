<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: text/plain');

require_once __DIR__ . '/../config.php';
    
    // Check all tables
    $tables = ['proprietaire', 'locataire', 'logement', 'attraction_et_reference', 'evenement', 'reservation'];
    
    foreach ($tables as $table) {
        $stmt = $pdo->query("SELECT COUNT(*) as cnt FROM $table");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "$table: " . $result['cnt'] . " rows\n";
    }
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}