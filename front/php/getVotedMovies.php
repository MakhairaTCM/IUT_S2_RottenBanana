<?php
include "./conexionAndClose.php";

$conn = connect();

$query = '
    SELECT film.titre AS title,
           SUM(IF(vote.vote = 1, 1, 0)) AS count_like,
           SUM(IF(vote.vote = -1, 1, 0)) AS count_dislike
    FROM film 
    INNER JOIN vote ON film.id_film = vote.id_film 
    GROUP BY film.id_film, film.titre 
    ORDER BY SUM(vote.vote) DESC 
    LIMIT 10'; 

$result = $conn->query($query);

$movies = [];

while ($row = $result->fetch_assoc()) {
    $movies[] = [
        'title' => $row['title'],
        'count_like' => intval($row['count_like']),
        'count_dislike' => intval($row['count_dislike'])
    ];
}

$conn->close();

echo json_encode($movies);
?>
