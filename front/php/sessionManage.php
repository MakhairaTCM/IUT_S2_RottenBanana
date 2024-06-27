<?php
session_start();
// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $isLoggedIn = true;
    $email = $_SESSION['user_id'];
} 
else {
    $isLoggedIn = false;
}

if (isset($_SESSION['admin'])) {
    if ($_SESSION['admin'] == true) {
        $isAdmin = true;
    }
    else {
        $isAdmin = false;
    }
}
else {
    $isAdmin = false;
} 
?>