<?php
include "./php/conexionAndClose.php";

$conn = connect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $movieId = $_POST['movieId'];
    $movieTitle = $_POST['movieTitle'];
    $movieGenre = $_POST['movieGenre'];
    $movieImgSrc = $_POST['movieImgSrc'];
    $valide = $_POST['valide'];

    $vote = $_POST['vote']; // +1 for upvote, -1 for downvote
    $mail = $_POST['mail']; // Email of the user

    // Insert vote record regardless of whether film record was inserted or updated
    $stmt_vote = $conn->prepare("INSERT INTO vote (mail, id_film, vote) VALUES (?, ?, ?)");
    $stmt_vote->bind_param("sii", $mail, $movieId, $vote);

    if ($stmt_vote->execute()) {
        echo "Vote record created successfully";
    } else {
        echo "Error: " . $stmt_vote->error;
    }

    $stmt_vote->close();

    // Check if movieId exists in Film table
    $stmt_check = $conn->prepare("SELECT id_film FROM Film WHERE id_film = ?");
    $stmt_check->bind_param("i", $movieId);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        // Movie already exists in Film table, skip insert/update
        echo "Film with ID $movieId already exists in the database. Skipping insert/update.";
    } else {
        // Movie does not exist in Film table, insert new record
        $stmt = $conn->prepare("INSERT INTO Film (id_film, titre, genre, url_poster, valide) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("isssi", $movieId, $movieTitle, $movieGenre, $movieImgSrc, $valide);
        if ($stmt->execute()) {
            echo "Film record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }

    $stmt_check->close();



    header("Location: index.php"); // Redirect to index.php after processing
    exit();
} else {
    echo "Invalid request method";
}

$conn->close();
?>