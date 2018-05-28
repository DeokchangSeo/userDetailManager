<?php
/*
 * Updates job with given id.
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

if (isset($_SESSION['category'])) {
	$category = $_SESSION['category'];
	//echo "<p>Hello!! {$category} </p>";
} else {
	$category = "";
}

if (isset($_GET['error'])) {
    $error = $_GET['error'];
} else {
    $error = 0;
}

$id = $_GET['id'];

$title_error = @$_GET['title_error'];
$location_error = @$_GET['location_error'];
$salary_error = @$_GET['salary_error'];

$job = get_job($id);

$smarty = new Smarty;

$smarty->assign('job',$job);

$smarty->assign("title_error",$title_error);
$smarty->assign("location_error",$location_error);
$smarty->assign("salary_error",$salary_error);

$smarty->assign("user", $user);
$smarty->assign("email", $email);
$smarty->assign("firstname", $firstname);
$smarty->assign("lastname", $lastname);
$smarty->assign("category", $category);
$smarty->assign("error", $error);

$smarty->display('update_job.tpl');
?>
