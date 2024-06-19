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
    // Génère un ID unique de 11 chiffres en tant qu'entier
    $movieId = generateUniqueMovieId($conn);

    $movieTitle = $_POST['movieTitle'];
    $movieGenre = $_POST['movieGenre'];
    $movieImgSrc = $_POST['movieImgSrc'];
    $valide = 0; // Initialise à 0, comme requis

    $stmt = $conn->prepare("INSERT INTO Film (id_film, titre, genre, url_poster, valide) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("isssi", $movieId, $movieTitle, $movieGenre, $movieImgSrc, $valide);

    if ($stmt->execute()) {
        // echo "Film record created successfully";
        header("location: ../pages/adminModifyAdd.html");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();

// Fonction pour générer un ID unique de 11 chiffres en tant qu'entier
function generateUniqueMovieId($conn)
{
    $uniqueId = null;
    do {
        // Génère un ID unique de 9 chiffres
        $uniqueId = mt_rand(100000000, 999999999); // Utilise des limites pour obtenir un entier de 11 chiffres
        // Vérifie si l'ID généré existe déjà dans la base de données
        $query = "SELECT id_film FROM Film WHERE id_film = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $uniqueId);
        $stmt->execute();
        $stmt->store_result();
    } while ($stmt->num_rows > 0);

    $stmt->close();

    return $uniqueId;
}
// header("location: ./adminModifyAdmin.html");
