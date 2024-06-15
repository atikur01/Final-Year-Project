<?php
// Start the session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Unset all POST variables
unset($_POST);

// Unset all FILES variables
unset($_FILES);

// Redirect to the login page
header("Location: ../login.php");
exit();
?>
