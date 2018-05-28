<?php
/*
 * Updates job from form data.
 */
require "libs/Smarty.class.php";
require "includes/defs.php";

// Get form data
$id = $_POST['id'];
$employer = $_POST['employer'];
$title = $_POST['title'];
$location = $_POST['location'];
$description = $_POST['description'];
$salary = $_POST['salary'];

// Check data is valid
$title_error = "";
if (empty($title)) {
    $title_error = "Title must be nonempty.";
}

$location_error = "";
if (empty($location)) {
    $location_error = "Location must be nonempty.";
}

$salary_error = "";
if (! is_numeric($salary) || $salary <= 0) {
    $salary_error = "Salary must be a positive integer.";
}

if ($title_error || $location_error || $salary_error) {
    header("Location: update_job.php?id=$id&title_error=$title_error&location_error=$location_error&salary_error=$salary_error");
    exit;
}

// Perform update with data
update_job($id,$title,$location,$description,$salary);

// Redirect to job details page
header("Location: job_detail.php?id=$id&is_employer=true"); 
exit;
?>
