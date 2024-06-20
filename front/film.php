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

    // Check if movieId exists in Film table
    $stmt_check = $conn->prepare("SELECT id_film FROM Film WHERE id_film = ?");
    $stmt_check->bind_param("i", $movieId);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        // Movie already exists in Film table, skip insert
        echo "Film with ID $movieId already exists in the database. Skipping insert.";
    } else {
        // Movie does not exist in Film table, insert new record
        $stmt = $conn->prepare("INSERT INTO Film (id_film, titre, genre, url_poster, valide) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("isssi", $movieId, $movieTitle, $movieGenre, $movieImgSrc, $valide);
        if ($stmt->execute()) {
            echo "Film record created successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }

    $stmt_check->close();

    // Check if vote record already exists
    $stmt_check_vote = $conn->prepare("SELECT * FROM vote WHERE mail = ? AND id_film = ?");
    $stmt_check_vote->bind_param("si", $mail, $movieId);
    $stmt_check_vote->execute();
    $stmt_check_vote->store_result();

    if ($stmt_check_vote->num_rows > 0) {
        // Vote already exists, update the record
        $stmt_update_vote = $conn->prepare("UPDATE vote SET vote = ? WHERE mail = ? AND id_film = ?");
        $stmt_update_vote->bind_param("isi", $vote, $mail, $movieId);

        if ($stmt_update_vote->execute()) {
            echo "Vote record updated successfully.";
        } else {
            echo "Error: " . $stmt_update_vote->error;
        }

        $stmt_update_vote->close();
    } else {
        // Insert new vote record
        $stmt_vote = $conn->prepare("INSERT INTO vote (mail, id_film, vote) VALUES (?, ?, ?)");
        $stmt_vote->bind_param("sii", $mail, $movieId, $vote);

        if ($stmt_vote->execute()) {
            echo "Vote record created successfully.";
        } else {
            echo "Error: " . $stmt_vote->error;
        }

        $stmt_vote->close();
    }

    $stmt_check_vote->close();

    header("Location: index.php"); // Redirect to index.php after processing
    exit();
} else {
    echo "Invalid request method";
}

$conn->close();
?>
