<?php
/*
 * Function definitions for Assignment 1 solution.
 */
require "db_defs.php";

define("MAX_WIDTH", 2000);
define("MAX_HEIGHT", 2000);

/* Returns true if $username/$password matches, else false */
function authenticate($username, $password) {

	if (!isset($username) || !isset($password))
		return false;

	$salt = substr($username, 0, 2);
	$encryptedPassword = crypt($password, $salt);
	
	$connection = mysql_open();
	
	$query = "select * from employee where username = '$username' and password = '$encryptedPassword'";

	$result = mysql_query($query, $connection) or show_error();
	
	$user = mysql_fetch_array($result);
	
    mysql_close($connection) or show_error();
    return $user;
}

/* Adds a new user to database */
function add_user($employer, $username, $password, $email, $firstname, $lastname, $category, $phoneno, $image) {

	$image_details = process_uploaded_image_file($image);
	
	$salt = substr($username, 0,2);
	$storedPassword = crypt($password, $salt);
    $email = mysql_escape_string($email);
    $firstname = mysql_escape_string($firstname);
    $lastname = mysql_escape_string($lastname);
    $phoneno = mysql_escape_string($phoneno);
    $category = mysql_escape_string($category);
	$employer = mysql_escape_string($employer);

    $connection = mysql_open();

    if (empty($image_details)) {
	   	$query = "insert into employee (employer, username, password, email, firstname, lastname, category, phoneno) " .
				 "values ('$employer', '$username', '$storedPassword', '$email', '$firstname', '$lastname', '$category', '$phoneno')";
	} else {
		list ($imagedata, $imagename, $imagetype, $imagewidthheight) = $image_details;
	   	$query = "insert into employee (employer, username, password, email, firstname, lastname, category, phoneno, imagedata, imagename, imagetype, imagesize) " .
				 "values ('$employer', '$username', '$storedPassword', '$email', '$firstname', '$lastname', '$category', '$phoneno', '$imagedata', '$imagename', '$imagetype', '$imagewidthheight')";
    }
    
    $results = mysql_query($query,$connection) or show_error();
    $id = mysql_insert_id();
    
    mysql_close($connection) or show_error();
    return $id;
}

/* Check redundancy tuple for adding user */
function redundancy_username($username) {

    $connection = mysql_open();

    $query = "select * from employee where username = '$username' ";

    $result = mysql_query($query, $connection) or show_error();

	$row = mysql_fetch_array($result);

	mysql_close($connection) or show_error();
	return $row;
}

/* Add new application */
function add_application($userID,$firstname,$lastname,$applicationletter,$jobID) {

    $applicationletter = mysql_escape_string($applicationletter);
    
    $connection = mysql_open();
    
    $epoch = time();

   	$query = "insert into application (applicant, firstname, lastname, letter, jobID, epoch) " .
			 "values ('$userID', '$firstname', '$lastname', '$applicationletter', '$jobID', from_unixtime('$epoch'))";
    
    $results = mysql_query($query,$connection) or show_error();
    $id = mysql_insert_id();
    
    mysql_close($connection) or show_error();
    return $id;
}

/* Check redundancy tuple for application */
function overlap_check($userID, $jobID) {

    $connection = mysql_open();

    $query = "select * from application where applicant = '$userID' and jobID = '$jobID' ";

    $result = mysql_query($query, $connection) or show_error();

	$row = mysql_fetch_array($result);

	mysql_close($connection) or show_error();
	return $row;
}

/* Process for image file */
function process_uploaded_image_file($image) {
	// Check upload succeeded
	if (!is_uploaded_file($image['tmp_name']) || $image['size'] == 0) {
	return NULL;
	} 

	// Extract details
	$imagedata = addslashes(file_get_contents($image['tmp_name']));
	$imagename = addslashes(basename($image['name']));
	$imagesize = getimagesize($image['tmp_name']); // an array
	$imagewidthheight = addslashes($imagesize[3]); 
	$imagetype = $imagesize['mime'];

	// Check file is a JPEG
  	if ($imagetype != "image/jpeg") {
    	return NULL;
  	}

	return array($imagedata, $imagename, $imagetype, $imagewidthheight);
}

/* Return the image in the given database entry. */
function getImage($id)
{
    $connection = mysql_open();
    
    $query = "select imagedata, imagename, imagetype, imagesize " .
           	 "from employee where id = $id";
    
    $result = @ mysql_query($query, $connection) or show_error();
	$row = mysql_fetch_array($result);

	mysql_close($connection) or show_error();
	return $row;
}

/* Change user password. */
function change_password($id,$username,$password) {
    
    $salt = substr($username, 0,2);
	$storedPassword = crypt($password, $salt);
	
    $connection = mysql_open();

    $update = "update employee " .
              "set password = '$storedPassword', username = '$username' " .
		      "where id = $id";
    //print "$update<br>\n";
    $result = mysql_query($update,$connection) or show_error();
}

/* Change user job position. */
function change_job_position($id,$category,$employer) {
    
    $category = mysql_escape_string($category);
	$employer = mysql_escape_string($employer);
	
    $connection = mysql_open();

    $update = "update employee " .
              "set category = '$category', employer = '$employer' " .
		      "where id = $id";
    //print "$update<br>\n";
    $result = mysql_query($update,$connection) or show_error();
}

/* Returns list of all user names. */
function get_users() {
    $connection = mysql_open();

    $select = "select e.id, e.username, e.category from employee e ";
    $select .=  "order by e.id";
    //print "$select<br>\n";
    $users = mysql_array_query($select,$connection);

    mysql_close($connection) or show_error();
    return $users;
}

/* Gets user with the given id. */
function get_user($id) {
    $connection = mysql_open();

    $query = "select id, employer, username, password, email, firstname, lastname, category, phoneno, imagedata, imagename, imagetype, imagesize from employee where id = $id";
    $result = mysql_query($query,$connection) or show_error();

    if (mysql_num_rows($result) != 1) {
        echo "Invalid query or result: $query\n";
        die();
    }
    $user = mysql_fetch_array($result);

    mysql_close($connection) or show_error();
    return $user;
}

/* Returns list of all employer names. */
function get_employers() {
    $connection = mysql_open();

    $select = "select e.id, e.name from employer e ";
    $select .=  "order by e.id";
    //print "$select<br>\n";
    $employers = mysql_array_query($select,$connection);

    mysql_close($connection) or show_error();
    return $employers;
}

/* Returns employer with the given id. */
function get_employer($id) {
    $connection = mysql_open();

    $select = "select id, name, industry, description " .
              "from employer where id = $id";
    //print "$select<br>\n";
    $result = mysql_query($select,$connection) or show_error();

    if (mysql_num_rows($result) != 1) {
        echo "Invalid query or result: $query\n";
        die();
    }
    $employer = mysql_fetch_array($result);

    mysql_close($connection) or show_error();
    return $employer;
}

/* Adds a new job from form data and returns its id. */
function add_job($employer,$title,$location,$description,$salary,$duedate) {
    // Sanitise input data
    $employer = $employer;
    $title = mysql_escape_string($title);
    $location = mysql_escape_string($location);
    $description = mysql_escape_string($description);
    $salary = $salary;
	$epoch = time();
    $duedate = $duedate;

    $connection = mysql_open();
    
    // Execute query
    $insert = "insert into job (employer,title,location,description,salary,epoch,duedate) " .
               "values ($employer,'$title','$location','$description',$salary,from_unixtime('$epoch'),from_unixtime('$duedate'))";
    //print "$insert<br>\n";
    $result = mysql_query($insert,$connection) or show_error();
    $id = mysql_insert_id();
    
    mysql_close($connection) or show_error();
    return $id;
}

/* 
 * Returns list of jobs whose job matchs $term, if present.
 * Otherwise returns list of all job titles.
 * This function is only for managers and admin.
 */
function find_jobs_manager_admin($str, $offset, $jobs_per_page) {
    $connection = mysql_open();

	$str = mysql_escape_string($str);

    $query = "select SQL_CALC_FOUND_ROWS * from job j ";

    if (!empty($str)) {
		if (is_numeric($str)) {
		    $query .= "where j.salary >= $str ";
		} else {
		    $query .= "where j.location like '%$str%' " .
	               "or '$str' in (select e.industry from employer e " .
		           "where e.id = j.employer) ";
		}
    } 
    $query .=  "order by j.id ";
    $query .= "LIMIT $offset, $jobs_per_page ";
    
    $result = mysql_query($query, $connection) or show_error();
	$result2 = mysql_query("SELECT FOUND_ROWS()", $connection) or show_error();
	$row = mysql_fetch_array($result2);
	$num_jobs = $row[0];

    $jobs = array();
    while ($job = mysql_fetch_array($result)) {
        $jobs[] = $job;
    }

    mysql_close($connection) or show_error();
    return array($jobs, $num_jobs);
}

/* 
 * Returns list of jobs whose job matchs $term, if present.
 * Otherwise returns list of all job titles.
 * This function is only for unregistered users and normal users.
 */
function find_jobs($str, $offset, $jobs_per_page) {
    $connection = mysql_open();

	$str = mysql_escape_string($str);

    $query = "select SQL_CALC_FOUND_ROWS * from job j where unix_timestamp(CURDATE()) < unix_timestamp(j.duedate)";

    if (!empty($str)) {
		if (is_numeric($str)) {
		    $query .= "and j.salary >= $str ";
		} else {
		    $query .= "and j.location like '%$str%' " .
	               "or '$str' in (select e.industry from employer e " .
		           "where e.id = j.employer) ";
		}
    } 
    $query .=  "order by j.id ";
    $query .= "LIMIT $offset, $jobs_per_page ";
    
    $result = mysql_query($query, $connection) or show_error();
	$result2 = mysql_query("SELECT FOUND_ROWS()", $connection) or show_error();
	$row = mysql_fetch_array($result2);
	$num_jobs = $row[0];

    $jobs = array();
    while ($job = mysql_fetch_array($result)) {
        $jobs[] = $job;
    }

    mysql_close($connection) or show_error();
    return array($jobs, $num_jobs);
}

/* 
 * Returns list of job titles whose job has the employer with the given id.
 * This function is only for unregistered users and normal users.
*/
function get_jobs($id, $offset, $jobs_per_page) {
    $connection = mysql_open();

    $select = "select SQL_CALC_FOUND_ROWS * from job j " .
              "where j.employer = $id and unix_timestamp(CURDATE()) < unix_timestamp(j.duedate) " .
		      "order by j.id ";
    $select .= "LIMIT $offset, $jobs_per_page ";

    //print "$select<br>\n";
    $result = mysql_query($select, $connection) or show_error();
	$result2 = mysql_query("SELECT FOUND_ROWS()", $connection) or show_error();
	$row = mysql_fetch_array($result2);
	$num_jobs = $row[0];
	// print $num_jobs;

    $jobs = array();
    while ($job = mysql_fetch_array($result)) {
        $jobs[] = $job;
    }
    
    mysql_close($connection) or show_error();
    return array($jobs, $num_jobs);
}

/* 
 * Returns list of job titles whose job has the employer with the given id.
 * This function is only for manager and admin.
*/
function get_jobs_manager_admin($id, $offset, $jobs_per_page) {
    $connection = mysql_open();

    $select = "select SQL_CALC_FOUND_ROWS * from job j " .
              "where j.employer = $id " .
		      "order by j.id ";
    $select .= "LIMIT $offset, $jobs_per_page ";
    
    $result = mysql_query($select, $connection) or show_error();
	$result2 = mysql_query("SELECT FOUND_ROWS()", $connection) or show_error();
	$row = mysql_fetch_array($result2);
	$num_jobs = $row[0];

    $jobs = array();
    while ($job = mysql_fetch_array($result)) {
        $jobs[] = $job;
    }
    
    mysql_close($connection) or show_error();
    return array($jobs, $num_jobs);
}

/* Get number of jobs for unregistered users and normal users. */
function get_recent_jobs() {
    $connection = mysql_open();

    $select = "select SQL_CALC_FOUND_ROWS * from job j where unix_timestamp(CURDATE()) < unix_timestamp(j.duedate) " .
		      "order by j.epoch desc ";
    $select .= "LIMIT 0, 5 ";
    
    //print "$select<br>\n";
    $result = mysql_query($select, $connection) or show_error();
	$result2 = mysql_query("SELECT FOUND_ROWS()", $connection) or show_error();
	$row = mysql_fetch_array($result2);
	$num_jobs = $row[0];
	// print $num_jobs;

    $jobs = array();
    while ($job = mysql_fetch_array($result)) {
        $jobs[] = $job;
    }
    
    mysql_close($connection) or show_error();
    return array($jobs, $num_jobs);
}

/* Get number of jobs for manager and admin */
function get_recent_jobs_manager_admin() {
    $connection = mysql_open();

    $select = "select SQL_CALC_FOUND_ROWS * from job j " .
		      "order by j.epoch desc ";
    $select .= "LIMIT 0, 5 ";
    
    //print "$select<br>\n";
    $result = mysql_query($select, $connection) or show_error();
	$result2 = mysql_query("SELECT FOUND_ROWS()", $connection) or show_error();
	$row = mysql_fetch_array($result2);
	$num_jobs = $row[0];
	// print $num_jobs;

    $jobs = array();
    while ($job = mysql_fetch_array($result)) {
        $jobs[] = $job;
    }
    
    mysql_close($connection) or show_error();
    return array($jobs, $num_jobs);
}

/* Returns job with the given id. */
function get_job($id) {
    $connection = mysql_open();

    $select = "select id, employer, title, location, description, salary, epoch, duedate " .
              "from job where id = $id";
    //print "$select<br>\n";
    $result = mysql_query($select,$connection) or show_error();

    if (mysql_num_rows($result) != 1) {
        echo "Invalid query or result: $query\n";
        die();
    }
    $job = mysql_fetch_array($result);

    mysql_close($connection) or show_error();
    return $job;
}

/* Returns time remaining for a job with the given id. */
function get_remain_time($jobid) {
    $connection = mysql_open();

    $select = "select unix_timestamp(duedate) as duedate from job where id = $jobid";
    
    //print "$select<br>\n";
    $result = mysql_query($select,$connection) or show_error();

	$date = mysql_fetch_array($result);
	$duedate =	$date['duedate'];
    //echo"$duedate<br>";
    
    $curtime = time();
	$diff = $duedate - $curtime;
	$remaintime = 0;
	
	if ($diff >= 0) {
		$remaintime = diffToWords($diff);
	}

    mysql_close($connection) or show_error();
    return $remaintime;
}

/* Convert a duration in seconds to an equivalent string of words */
function diffToWords($diff) {
    $ndays = (int)($diff / 86400);
    $diff = $diff % 86400;
    $nhours = (int)($diff / 3600);
    $diff = $diff % 3600;
    $nmins = (int)($diff / 60);
    $diff = $diff % 60;
    $result = "";

    if ($ndays > 0) $result .= "$ndays days ";
    if ($nhours > 0) $result .= "$nhours hours ";
    if ($nmins > 0) $result .= "$nmins mins ";
    if ($ndays == 0 && $diff > 0) $result .= "$diff secs ";
    return $result;
}

/* Returns list of all application for the job. */
function get_applications($jobID) {
    $connection = mysql_open();

    $select = "select * from application a where a.jobID = $jobID ";
    $select .=  "order by a.jobID";
    //print "$select<br>\n";
    $applications = mysql_array_query($select,$connection);

    mysql_close($connection) or show_error();
    return $applications;
}

/* Returns application with the given id. */
function get_application($id) {
    $connection = mysql_open();

    $select = "select * " .
              "from application a, employee e where a.applicant = e.id and a.id = $id";
    //print "$select<br>\n";
    $result = mysql_query($select,$connection) or show_error();

    if (mysql_num_rows($result) != 1) {
        echo "Invalid query or result: $query\n";
        die();
    }
    $application = mysql_fetch_array($result);

    mysql_close($connection) or show_error();
    return $application;
}

/* Updates an job with the given id using the given summary and details. */
function update_job($id,$title,$location,$description,$salary) {
    // Sanitise input data
    $title = mysql_escape_string($title);
    $location = mysql_escape_string($location);
    $description = mysql_escape_string($description);
    $salary = $salary;
    $epoch = time();
    
    $connection = mysql_open();

	$update = "update job " .
			"set title = '$title', location = '$location', " .
			"description = '$description', salary = $salary, epoch = from_unixtime('$epoch') " .
			"where id = $id";
    //print "$update<br>\n";
    $result = mysql_query($update,$connection) or show_error();
}

/* Deletes the job with the given id. */
function delete_job($id) {
    $connection = mysql_open();

    $delete = "delete from job where id = $id";
    //print "$delete<br>\n";
    $result = mysql_query($delete,$connection) or show_error();
}

/* Deletes the application with the given id. */
function delete_application($id) {
    $connection = mysql_open();

    $delete = "delete from application where jobID = $id";
    //print "$delete<br>\n";
    $result = mysql_query($delete,$connection) or show_error();
}

