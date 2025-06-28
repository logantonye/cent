<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start the session
session_start();

// Set the session variable
$_SESSION['user_id'] = $_REQUEST['id'];

// Redirect the user
header("Location: ../dashboard/index.php");
exit(); // Ensure that no further output is sent after the header
?>
