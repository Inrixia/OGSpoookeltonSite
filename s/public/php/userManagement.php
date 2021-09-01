<?php
require "core.php";
$nameClear = $passClear = ""; // Define the name and password variables
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST['btnLogin'])) { // If the login button is pressed
		if (empty($_POST["name-login"])) { // If the username is empty then return the appropriate error
			echoErr("Please enter a Username");
		}
		else if (empty($_POST["pass-login"])) { // Same as above for password
			echoErr("Please enter a Password");
		} else { // Clean both inputs and login (Functions in core)
			$nameClear = test_input($_POST["name-login"]);
			$passClear = test_input($_POST["pass-login"]);
			login_db($nameClear, $passClear);
		}
	} else if (isset($_POST['btnRegister'])) { // If the register button is pressed
	  if (empty($_POST["name"])) { // If the username is empty then return the appropriate error
	    echoErr("Please enter a Username");
	  } 
	  else if (empty($_POST["pass"])) { // Same as above for password
	    echoErr("Please enter a Password");
		} else { // Clense both inputs and add new user and login (Function in core)
			$nameClear = test_input($_POST["name"]);
			$passClear = test_input($_POST["pass"]);
			write_db($nameClear, $passClear);
			}
  }
}
?>