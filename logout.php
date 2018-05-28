<?php
/* logout for current user */
session_start();

session_destroy();

header("location: index.php");
exit;
?>