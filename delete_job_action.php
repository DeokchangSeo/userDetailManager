<?php
/*
 * Deletes job with given id.
 */
require "libs/Smarty.class.php";
require "includes/defs.php";

$id = $_GET['id'];

$job = get_job($id);
$employer = $job['employer'];

delete_job($id);

// Deletes application related with this job
delete_application($id);

header("Location: employer_detail.php?id={$employer['id']}");
exit;
?>
