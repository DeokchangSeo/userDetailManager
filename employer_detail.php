<?php
/*
 * Displays details of employer with given id.
 */
require "libs/Smarty.class.php";
require "includes/defs.php";

define("jobs_per_page", 5);

session_start();

if (isset($_SESSION['id'])) {
	$id = $_SESSION['id'];
	//echo "<p>Hello!! {$id} </p>";
} else {
	$id = "";
}

if (isset($_SESSION['employer'])) {
	$employerID = $_SESSION['employer'];
	//echo "<p>Hello!! {$employerID} </p>";
} else {
	$employerID = "";
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
    $error = 0;
}

if (isset($_GET['query'])) {
    $query = $_GET['query'];
	//echo "<p>Hello!! {$query} </p>";    
} else {
    $query = "";
}

if (isset($_GET['offset'])) {
    $offset = $_GET['offset'];
} else {
    $offset = 0;
}

$id = $_GET['id'];

$employer = get_employer($id);


if ($category == "manager" || $category == "admin") {
	list($jobs, $num_jobs) = get_jobs_manager_admin($id, $offset, jobs_per_page);
	$total_pages = ceil($num_jobs / jobs_per_page);
} else {
	list($jobs, $num_jobs) = get_jobs($id, $offset, jobs_per_page);
	$total_pages = ceil($num_jobs / jobs_per_page);
}

$smarty = new Smarty;

$smarty->assign("employer",$employer);
$smarty->assign("query",$query);
$smarty->assign("offset", $offset);
$smarty->assign("jobs_per_page", jobs_per_page);
$smarty->assign("num_jobs", $num_jobs);
$smarty->assign("total_pages", $total_pages);
$smarty->assign("jobs",$jobs);

$smarty->assign("id", $id);
$smarty->assign("employerID", $employerID);
$smarty->assign("user", $user);
$smarty->assign("email", $email);
$smarty->assign("firstname", $firstname);
$smarty->assign("lastname", $lastname);
$smarty->assign("category", $category);
$smarty->assign("error", $error);

$smarty->display("employer_detail.tpl");
?>
