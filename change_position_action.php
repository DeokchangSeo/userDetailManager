<?php
/*
 * Change job position.
 */
require "libs/Smarty.class.php";
require "includes/defs.php";

// Get form data
$id = @$_POST['id'];
$category = @$_POST['category'];
$employer = @$_POST['employer'];

// Perform update with data
change_job_position($id,$category,$employer);

// Redirect to job details page
header("Location: user_detail.php?id=$id"); 
exit;
?>
