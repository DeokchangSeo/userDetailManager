<?php
/*
 * Displays details of job with given id.
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

$jobid = $_GET['id'];
$is_employer = @$_GET['is_employer'];

$job = get_job($jobid);
$remaintime = get_remain_time($jobid);
$employer = get_employer($job['employer']);
$applications = get_applications($jobid);

$smarty = new Smarty;

$smarty->assign("job",$job);
$smarty->assign("remaintime",$remaintime);
$smarty->assign("employer",$employer);
$smarty->assign("is_employer",$is_employer);
$smarty->assign("applications",$applications);

$smarty->assign("id", $id);
$smarty->assign("employerID", $employerID);
$smarty->assign("user", $user);
$smarty->assign("email", $email);
$smarty->assign("firstname", $firstname);
$smarty->assign("lastname", $lastname);
$smarty->assign("category", $category);
$smarty->assign("error", $error);

$smarty->display("job_detail.tpl");
?>