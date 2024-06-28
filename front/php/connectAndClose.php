<?php
$servername = "localhost";  
$username = "root";  
$password = ""; 

$database = "databasegroupe5"; 

 // Create a connection  
 $conn = mysqli_connect($servername, $username, $password, $database); 

if($conn) { 
    echo `<script>console.log("Connected to DB");<script>`;  
}  
else { 
    die("Error". mysqli_connect_error());  
}

function disconnect($conn){
    $conn->close();
}

?>
