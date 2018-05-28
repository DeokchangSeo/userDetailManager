<?php
/*
 * Make an application from form data.
 */
require "libs/Smarty.class.php";
require "includes/defs.php";

session_start();

if (isset($_SESSION['user'])) {
	$user = $_SESSION['user'];
	//echo "<p>Hello!! {$user} </p>";
} else {
	$user = "";
}

if (isset($_SESSION['firstname'])) {
	$firstname = $_SESSION['firstname'];
	//echo "<p>Hello!! {$firstname} </p>";
} else {
	$firstname = "";
}

if (isset($_SESSION['lastname'])) {
	$lastname = $_SESSION['lastname'];
	//echo "<p>Hello!! {$lastname} </p>";
} else {
	$lastname = "";
}

// Get form data
$userID = $_POST['username'];
$jobID = $_POST['job'];
$applicationletter = $_POST['applicationletter'];

// Add new application with form data
$applicationID = add_application($userID,$firstname,$lastname,$applicationletter,$jobID);

// Redirect to new application details page
header("Location: application.php?applicationID=$applicationID&jobID=$jobID"); 
exit;
?>
