<?php
include "conexionAndClose.php";
$conn = connect();
$userEmail = 'user1@example.com'; // Replace with actual user email or session variable

$sql = "SELECT id_film, vote FROM vote WHERE mail = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $userEmail);
$stmt->execute();
$result = $stmt->get_result();

$userVotes = [];
while ($row = $result->fetch_assoc()) {
    $userVotes[$row['id_film']] = $row['vote'];
}

echo json_encode($userVotes);
$conn->close();
?>
