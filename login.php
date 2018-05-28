<?php
/*
 * login with given username and password
 */
require "includes/defs.php";

session_start();

$username = @$_POST['username'];
$password = @$_POST['password'];

list($id, $employer, $user, $pw, $email, $firstname, $lastname, $category, $phoneno, $imagedata, $imagename, $imagetype, $imagesize) = authenticate($username, $password);

if (empty($username) || empty($password)) {
    $error = "Username and Password must be nonempty.";
    header("Location: index.php?error=$error");
    exit;
} else if (empty($user) || empty($pw)) {
    $error = "Invalid username or password.";
    header("Location: index.php?error=$error");
    exit;
}

if (isset($id)) {
	$_SESSION['id'] = $id;
}
if (isset($employer)) {
	$_SESSION['employer'] = $employer;
}
if (isset($user)) {
	$_SESSION['user'] = $user;
}
if (isset($email)) {
	$_SESSION['email'] = $email;
}
if (isset($firstname)) {
	$_SESSION['firstname'] = $firstname;
}
if (isset($lastname)) {
	$_SESSION['lastname'] = $lastname;
}
if (isset($category)) {
	$_SESSION['category'] = $category;
}
header("location: index.php");
?>
