<?php
header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/../config.php';

try {
    // First, check if users already exist
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM utilisateur WHERE prenom = ? AND nom = ?");
    
    // Insert users if they don't exist
    $users = [
        ['id_user' => 2, 'nom' => 'Chartain', 'prenom' => 'Nadine Kate', 'email' => 'nadine.chartain@example.com', 'password' => 'password123', 'role' => 'client'],
        ['id_user' => 3, 'nom' => 'Gale', 'prenom' => 'Nadine', 'email' => 'nadine.gale@example.com', 'password' => 'password456', 'role' => 'client']
    ];
    
    foreach ($users as $user) {
        $stmt->execute([$user['prenom'], $user['nom']]);
        if ($stmt->fetchColumn() === 0) {
            $insertStmt = $pdo->prepare("INSERT INTO utilisateur (nom, prenom, email, mot_de_passe, role) VALUES (?, ?, ?, ?, ?)");
            $insertStmt->execute([$user['nom'], $user['prenom'], $user['email'], $user['password'], $user['role']]);
        }
    }
    
    // Create sample logement for reviews
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM logement");
    $stmt->execute();
    if ($stmt->fetchColumn() === 0) {
        $stmt = $pdo->prepare("INSERT INTO logement (id_proprietaire, description_logement) VALUES (?, ?)");
        $stmt->execute([1, 'Bel hôtel 5 étoiles à Hammamet']);
        $stmt->execute([1, 'Villa luxueuse à Tunis']);
    }
    
    // Get the users for inserting reviews
    $stmt = $pdo->prepare("SELECT id FROM utilisateur WHERE email = ?");
    
    $stmt->execute(['nadine.chartain@example.com']);
    $nadine1_id = $stmt->fetch(PDO::FETCH_ASSOC)['id'];
    
    $stmt->execute(['nadine.gale@example.com']);
    $nadine2_id = $stmt->fetch(PDO::FETCH_ASSOC)['id'];
    
    // Insert reviews
    $reviews = [
        ['id_client' => $nadine1_id, 'id_logement' => 1, 'commentaire' => 'Excellent séjour! Service impeccable et vue magnifique. Je recommande vivement!', 'note' => 5],
        ['id_client' => $nadine1_id, 'id_logement' => 2, 'commentaire' => 'Très beau logement, personnel très accueillant. À refaire!', 'note' => 5],
        ['id_client' => $nadine2_id, 'id_logement' => 1, 'commentaire' => 'Très bon rapport qualité-prix. Emplacement idéal pour découvrir la région.', 'note' => 4],
        ['id_client' => $nadine2_id, 'id_logement' => 2, 'commentaire' => 'Accueil chaleureux et endroit paisible. Parfait pour se détendre!', 'note' => 5]
    ];
    
    foreach ($reviews as $review) {
        // Check if review already exists
        $checkStmt = $pdo->prepare("SELECT COUNT(*) FROM avis WHERE id_client = ? AND id_logement = ?");
        $checkStmt->execute([$review['id_client'], $review['id_logement']]);
        if ($checkStmt->fetchColumn() === 0) {
            $insertStmt = $pdo->prepare("INSERT INTO avis (id_client, id_logement, commentaire, note) VALUES (?, ?, ?, ?)");
            $insertStmt->execute([$review['id_client'], $review['id_logement'], $review['commentaire'], $review['note']]);
        }
    }
    
    // Insert reservations (history)
    $reservations = [
        ['id_client' => $nadine1_id, 'id_logement' => 1, 'date_debut' => '2024-03-15', 'date_fin' => '2024-03-22', 'statut' => 'acceptee'],
        ['id_client' => $nadine1_id, 'id_logement' => 2, 'date_debut' => '2024-06-10', 'date_fin' => '2024-06-17', 'statut' => 'acceptee'],
        ['id_client' => $nadine2_id, 'id_logement' => 1, 'date_debut' => '2024-04-05', 'date_fin' => '2024-04-12', 'statut' => 'acceptee'],
        ['id_client' => $nadine2_id, 'id_logement' => 2, 'date_debut' => '2024-08-20', 'date_fin' => '2024-08-27', 'statut' => 'acceptee']
    ];
    
    foreach ($reservations as $reservation) {
        // Check if reservation already exists
        $checkStmt = $pdo->prepare("SELECT COUNT(*) FROM reservation WHERE id_client = ? AND id_logement = ? AND date_debut = ?");
        $checkStmt->execute([$reservation['id_client'], $reservation['id_logement'], $reservation['date_debut']]);
        if ($checkStmt->fetchColumn() === 0) {
            $insertStmt = $pdo->prepare("INSERT INTO reservation (id_client, id_logement, date_debut, date_fin, statut) VALUES (?, ?, ?, ?, ?)");
            $insertStmt->execute([$reservation['id_client'], $reservation['id_logement'], $reservation['date_debut'], $reservation['date_fin'], $reservation['statut']]);
        }
    }
    
    echo json_encode(['success' => true, 'message' => 'Users, reviews and reservations created successfully']);
    
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>
