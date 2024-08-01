<?php
session_start(); // Start the session if not already started

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect the user to the login page or any other desired location after logout
header("Location: ../index.php");
exit();
?>
