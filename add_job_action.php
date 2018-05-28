<?php
/*
 * Adds new job from form data.
 */
require "libs/Smarty.class.php";
require "includes/defs.php";

// Get form data
$employer = $_POST['employer'];
$title = $_POST['title'];
$location = $_POST['location'];
$description = $_POST['description'];
$salary = $_POST['salary'];
$date = $_POST['date'];
$duedate = strtotime($date);

// Add new job with form data
$id = add_job($employer,$title,$location,$description,$salary,$duedate);

// Redirect to new job details page
header("Location: job_detail.php?id=$id&is_employer=true"); 
exit;
?>