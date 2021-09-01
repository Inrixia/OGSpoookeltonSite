<?php
session_start(); // Start session

function echoErr($err) { // Define function for php to create javascript alert with passed text
  echo "<script type='text/javascript'>alert('$err');</script>";
}

function test_input($data) { // Clean any data passed for db insertion
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = strip_tags($data);
  return $data;
}

function write_db($name, $pass) { // Function for adding users to the users table and logging them in, accepts a username and password
	$conn = new mysqli('localhost', 'root', 'Sp00ked', 'frosty');
	$sql = "INSERT INTO users (username, pass) VALUES ('$name', '$pass')"; // Insert the new user

	if ($conn->query($sql) === TRUE) { // If the user was added successfully then set their session details and redirect them to the index
		$_SESSION['loggedin'] = true;
  	$_SESSION['user'] = $name;
  	header('Location: '.'/s/index.php');
	} else { // If it failed then the username allready exists, alert the user
  	echoErr("Username allready exists");
	}

	$conn->close();
}

function update_db($name, $pass) { // Function for changing a users password, accepts username and password
	$conn = new mysqli('localhost', 'root', 'Sp00ked', 'frosty');
	$sql = "UPDATE users SET pass='$pass' WHERE username='$name'"; // Change the users password

	if ($conn->query($sql) === TRUE) { // If the password was changed then alert the user
		echoErr("Password Changed!"); 
	}

	$conn->close();
}

function login_db($namelogin, $passlogin) { // Function used for logging into site, accepts username and password
	$conn = new mysqli('localhost', 'root', 'Sp00ked', 'frosty');
	$sql = "SELECT role FROM users WHERE username='$namelogin' AND pass='$passlogin'"; // Find a user from the database where the username and password matches
	$result = $conn->query($sql);

	if($result->num_rows === 0){ // If nothing is returned then, alert the user they did something wrong
      echoErr("Incorrect username/password...");
    } else { // If the database has that user then set their session details and return them to index
		  $_SESSION['loggedin'] = true;
		  $_SESSION['user'] = $namelogin;
		  header('Location: '.'/s/index.php');
	}

	$conn->close();
}
?>