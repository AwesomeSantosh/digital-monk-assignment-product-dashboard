<?php
// Initialize the session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page after logout
//header("Location: index.php");
header("Location: login.php");
exit();
?>
