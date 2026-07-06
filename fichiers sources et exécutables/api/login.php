<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Accept');
header('Access-Control-Max-Age: 3600');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

require_once __DIR__ . '/../config.php';
} catch (PDOException $e) {
    error_log("Login DB Error: " . $e->getMessage());
    echo '{"success":false,"error":"BD error: ' . $e->getMessage() . '"}';
    exit;
}

$input = file_get_contents('php://input');
$data = json_decode($input, true);

$email = isset($data['email']) ? trim($data['email']) : '';
$password = isset($data['password']) ? $data['password'] : '';

// Check proprietaire table
$stmt = $pdo->prepare("SELECT * FROM proprietaire WHERE ADRESSE_EMAIL_PROP = ? AND MOT_DE_PASSE_PROP = ?");
$stmt->execute([$email, $password]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    $result = array(
        'success' => true,
        'user' => array(
            'id' => $user['ID_PROPRIETAIRE'],
            'nom' => $user['NOM_PROP'],
            'prenom' => $user['PRENOM_PROP'],
            'email' => $user['ADRESSE_EMAIL_PROP'],
            'role' => 'proprietaire'
        )
    );
    echo json_encode($result);
    exit;
}

// Check locataire table
$stmt2 = $pdo->prepare("SELECT * FROM locataire WHERE ADRESSE_EMAIL_LOC = ? AND MOT_DE_PASSE_LOC = ?");
$stmt2->execute([$email, $password]);
$user2 = $stmt2->fetch(PDO::FETCH_ASSOC);

if ($user2) {
    $result = array(
        'success' => true,
        'user' => array(
            'id' => $user2['ID_LOCATAIRE'],
            'nom' => $user2['NOM_LOC'],
            'prenom' => $user2['PRENOM_LOC'],
            'email' => $user2['ADRESSE_EMAIL_LOC'],
            'role' => 'client'
        )
    );
    echo json_encode($result);
    exit;
}

echo '{"success":false,"error":"Email ou mot de passe incorrect"}';
?>