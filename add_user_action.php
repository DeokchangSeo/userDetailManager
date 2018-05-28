<?php
/*
 * Adds new user from form data.
 */
require "libs/Smarty.class.php";
require "includes/defs.php";

# Get form data
$employers = $_POST['employers'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$category = $_POST['category'];
$phoneno = $_POST['phoneno'];
$image = $_FILES['userfile'];

$redundancy = redundancy_username($username);

# Check redundancy for username
if ($redundancy != 0) {
    $error = "You cannot use this username!!";
    header("Location: add_user.php?error=$error");
    exit;
}

# add new user with form data
$id = add_user($employers, $username, $password, $email, $firstname, $lastname, $category, $phoneno, $image);

header("Location: user_detail.php?id=$id"); 
exit;
?>