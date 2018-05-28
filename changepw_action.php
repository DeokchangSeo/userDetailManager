<?php
/*
 * Change password.
 */
require "libs/Smarty.class.php";
require "includes/defs.php";

// Get form data
$id=$_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];

// Check data is valid
$password_error = "";
if (empty($password)) {
    $password_error = "Password must be nonempty.";
}

if ($password_error) {
    header("Location: user_detail.php?id=$id&password_error=$password_error");
    exit;
}

// Perform update with data
change_password($id,$username,$password);

// Redirect to user details page
header("Location: user_detail.php?id=$id&is_employer=true"); 
exit;
?>
