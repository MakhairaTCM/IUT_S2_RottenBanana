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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $movieId = $_POST['movieId'];
    $movieTitle = $_POST['movieTitle'];
    $movieGenre = $_POST['movieGenre'];
    $movieImgSrc = $_POST['movieImgSrc'];
    $valide = $_POST['valide'];

    $stmt = $conn->prepare("INSERT INTO Film (id_film, titre, genre, url_poster, valide) VALUES (?, ?, ?, ?, ?)
                            ON DUPLICATE KEY UPDATE titre=?, genre=?, url_poster=?, valide=?");
    $stmt->bind_param("isssisssi", $movieId, $movieTitle, $movieGenre, $movieImgSrc, $valide, $movieTitle, $movieGenre, $movieImgSrc, $valide);

    if ($stmt->execute()) {
        echo "Film record created/updated successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
