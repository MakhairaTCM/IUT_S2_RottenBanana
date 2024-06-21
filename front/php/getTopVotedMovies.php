<?php
include "./conexionAndClose.php";

$conn = connect();

$query = '
    SELECT film.titre, film.genre, film.url_poster, film.id_film, SUM(vote.vote) AS total_votes 
    FROM film 
    INNER JOIN vote ON film.id_film = vote.id_film 
    GROUP BY film.id_film, film.titre, film.genre, film.url_poster 
    ORDER BY total_votes DESC LIMIT 10'; 

$result = $conn->query($query);

$movies = [];

while ($row = $result->fetch_assoc()) {
    $movies[] = $row;
}

$conn->close();

echo json_encode($movies);
?>
