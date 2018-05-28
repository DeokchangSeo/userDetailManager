<?php
/*
 * Displays the list of job title that match a given query,
 * if present or the list of all job titles otherwise. 
 * Each title is a link to the job's details.
 */
require "libs/Smarty.class.php";
require "includes/defs.php";

session_start();

if (isset($_SESSION['id'])) {
	$id = $_SESSION['id'];
	//echo "<p>Hello!! {$id} </p>";
} else {
	$id = "";
}

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

if (isset($_SESSION['category'])) {
	$category = $_SESSION['category'];
	//echo "<p>Hello!! {$category} </p>";
} else {
	$category = "";
}

if (isset($_GET['error'])) {
    $error = $_GET['error'];
} else {
    $error = "";
}

if ($category == "manager" || $category == "admin") {
	list($jobs, $num_jobs) = get_recent_jobs_manager_admin();
} else {
	list($jobs, $num_jobs) = get_recent_jobs();
}

$smarty = new Smarty;

$smarty->assign("num_jobs", $num_jobs);
$smarty->assign("jobs",$jobs);

$smarty->assign("id", $id);
$smarty->assign("user", $user);
$smarty->assign("email", $email);
$smarty->assign("firstname", $firstname);
$smarty->assign("lastname", $lastname);
$smarty->assign("category", $category);
$smarty->assign("error", $error);

$smarty->display("index.tpl");
?>
