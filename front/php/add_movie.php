<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "databasegroupe5";

// Create the connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if movieId is set to determine if it's an update or new movie
    if (isset($_POST['movieId']) && !empty($_POST['movieId'])) {
        $movieId = $_POST['movieId'];
        $movieTitle = $_POST['movieTitle'];
        $movieGenre = $_POST['movieGenre'];
        $movieImgSrc = $_POST['movieImgSrc'];
        $movieSummary = $_POST['movieSummary'];

        // Update the existing movie
        $stmt = $conn->prepare("UPDATE Film SET titre = ?, genre = ?, url_poster = ?, resumer = ? WHERE id_film = ?");
        $stmt->bind_param("ssssi", $movieTitle, $movieGenre, $movieImgSrc, $movieSummary, $movieId);

        if ($stmt->execute()) {
            // Redirect to the admin list page after update
            header("location: ../pages/adminList.php");
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        // Adding a new movie
        $movieId = generateUniqueMovieId($conn);
        $movieTitle = $_POST['movieTitle'];
        $movieGenre = $_POST['movieGenre'];
        $movieImgSrc = $_POST['movieImgSrc'];
        $valide = 0; // Initialize to 0, as required

        $stmt = $conn->prepare("INSERT INTO Film (id_film, titre, genre, url_poster, resumer, valide) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issssi", $movieId, $movieTitle, $movieGenre, $movieImgSrc, $movieSummary, $valide);

        if ($stmt->execute()) {
            // Redirect to the add movie page after insertion
            header("location: ../pages/adminModifyAdd.php");
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();

// Function to generate a unique movie ID
function generateUniqueMovieId($conn)
{
    $uniqueId = null;
    do {
        // Generate a unique ID of 9 digits
        $uniqueId = mt_rand(100000000, 999999999); // Use limits to get a 9-digit integer
        // Check if the generated ID already exists in the database
        $query = "SELECT id_film FROM Film WHERE id_film = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $uniqueId);
        $stmt->execute();
        $stmt->store_result();
    } while ($stmt->num_rows > 0);

    $stmt->close();

    return $uniqueId;
}
?>
