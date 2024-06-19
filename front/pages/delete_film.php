<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database";

// Crée la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifie la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$response = array('success' => false, 'message' => '');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $movieId = $_POST['movieId'];

    $stmt = $conn->prepare("DELETE FROM Film WHERE id_film = ?");
    $stmt->bind_param("i", $movieId);

    if ($stmt->execute()) {
        $response['success'] = true;
        $response['message'] = "Film deleted successfully";
    } else {
        $response['message'] = "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
echo json_encode($response);
?>
