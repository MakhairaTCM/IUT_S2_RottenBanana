<?php
function connect(){
    $conn = new mysqli("localhost", "root", "", "databasegroupe5");

    // Vérifie la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function disconnect($conn){
    $conn->close();
    
}

?>