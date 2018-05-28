<?php
/*
 * Adds new job.  (Not used in this solution.)
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

if (isset($_SESSION['email'])) {
	$email = $_SESSION['email'];
	//echo "<p>Hello!! {$email} </p>";
} else {
	$email = "";
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

if (isset($_GET['error'])) {
    $error = $_GET['error'];
} else {
    $error = 0;
}

$smarty = new Smarty;

$smarty->assign("user", $user);
$smarty->assign("email", $email);
$smarty->assign("firstname", $firstname);
$smarty->assign("lastname", $lastname);
$smarty->assign("error", $error);

$smarty->display('add_job.tpl');
?>
