<?php
	session_start();
	$_SESSION['loggedin'] = false; // Resets the users session details and returns them to the index
	$_SESSION['user'] = "";
	$_SESSION['role'] = "";
	header('Location: '.'/s/index.php');
?>