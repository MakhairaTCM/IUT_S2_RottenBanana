<?php
session_start(); // Start the session
session_destroy(); // Destroy the session to log out the user

header("Location: ../pages/login.php"); // Redirect to login page
?>