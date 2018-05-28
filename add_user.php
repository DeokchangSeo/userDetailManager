<?php
/*
 * Adds new user.
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

if (isset($_POST['admin'])) {
    $admin = $_POST['admin'];
} else {
    $admin = "";
}

if (isset($_GET['error'])) {
    $error = $_GET['error']; # for error reporting
} else {
    $error = "";
}

$employers = get_employers();

$smarty = new Smarty;

$smarty->assign("id", $id);
$smarty->assign("user", $user);
$smarty->assign("email", $email);
$smarty->assign("firstname", $firstname);
$smarty->assign("lastname", $lastname);
$smarty->assign("category", $category);

$smarty->assign('error',$error);
$smarty->assign('admin',$admin);
$smarty->assign('employers',$employers);
$smarty->display('add_user.tpl');
?>
