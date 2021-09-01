<?php
require "core.php";

$passChange = $name = ""; // Define passchange and name

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_SESSION['user'];
	$passClear = test_input($_POST["pass-change"]); // Run checking over the new password to ensure its safe to insert into database (Code in core)
	if (empty($_POST["pass-change"])) { // If the password is empty then echo an error
		echoErr("Please enter your password");
	} 
	elseif (isset($_POST['btnChange'])) { // If the button to change the password has been pressed then update the password (Function in core)
		update_db($name, $passClear);
	}
}
?>