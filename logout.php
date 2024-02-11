<?php
// Start the session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Unset all POST variables
foreach ($_POST as $key => $value) {
    unset($_POST[$key]);
}

// Unset all FILES variables
foreach ($_FILES as $key => $value) {
    unset($_FILES[$key]);
}

// Redirect to the login page
header("Location: ../login.php");
exit();
?>
