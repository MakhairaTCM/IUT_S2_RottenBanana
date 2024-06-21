<?php
include "./conexionAndClose.php";

$conn = connect();

$sql = "SELECT film.genre, SUM(vote.vote) AS total_votes_genre
        FROM film
        INNER JOIN vote ON film.id_film = vote.id_film
        GROUP BY film.genre
        ORDER BY total_votes_genre DESC";
$result = $conn->query($sql);

$data = array();


if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo "0 results";
}
$conn->close();

echo json_encode($data);
?>
