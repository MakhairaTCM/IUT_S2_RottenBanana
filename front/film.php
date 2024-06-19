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

    $stmt = $conn->prepare("INSERT INTO Film (id_film, titre, genre, url_poster, valide) VALUES (?, ?, ?, ?, ?)
                            ON DUPLICATE KEY UPDATE titre=?, genre=?, url_poster=?, valide=?");
    $stmt->bind_param("isssisssi", $movieId, $movieTitle, $movieGenre, $movieImgSrc, $valide, $movieTitle, $movieGenre, $movieImgSrc, $valide);



    if ($stmt->execute()) {
        echo "Film record created/updated successfully";
    } else {
        echo "Error: " . $stmt->error;
    }


    $stmt2 = $conn->prepare("INSERT INTO vote (mail, id_film, vote) VALUES (?, ?, ?)");
    $stmt2->bind_param("sii", $mail, $movieId, $vote);
     
    if ($stmt2->execute()) {
        echo "vote record created/updated successfully";
    } else {
        echo "Error: " . $stmt->error;
    }


    $stmt->close();
    $stmt2->close();


    header("index.php");
}



$conn->close();
?>
