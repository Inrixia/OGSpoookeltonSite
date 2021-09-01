<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Joe's Frosty Donuts</title>
    <link rel="shortcut icon" href="public/img/logo-small.png"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link href="public/css/buy.css" rel="stylesheet">
  </head>
  <body>
		<div class='fullscreenDiv'>
		  <?php
			  if (isset($_POST['total'])) { // If the user actually has stuff to buy go ahead otherwise just dont bother
			  	$total = $_POST['total'];
			  	session_start();
			  	date_default_timezone_set('UTC');
			  	$date = date("Y-m-d H:i:s");
			  	$user_id = $_SESSION['user'];
			  	$connection = new mysqli('localhost', 'root', 'Sp00ked', 'frosty');
			  	$sql = "INSERT INTO purchases (user_id, total, datepur, status) VALUES ('$user_id', '$total', '$date', 'Ordered')"; // Adds the pruchase with the date, user, total and status to the pruchases table
			  	$connection->query($sql);
					echo "<p class='center'> Purchased <a style='color: #2ba6cb;'>$$total</a></p>
			  	<a href='/s/index.php'><input type='button' value='Return'></a>
			  	"; // Shows the ammount purchases and gives the return button
			  	$sql = "SELECT * FROM cart WHERE user='$user_id'"; // Gets everything from the users cart
			  	if (!$resultt = $connection->query($sql)) {}
			  	while ($roww = $resultt->fetch_array()) { // For each item in the users cart
			  		$id = $roww['item_id'];
            $sql = "SELECT * FROM products WHERE id='$id'"; // Select the details of the item currently selected from the cart from the products table
            if (!$result = $connection->query($sql)) {}
            while ($row = $result->fetch_array()) {
            	$stock = ($row['stock'] - $roww['ammount']); // Generate a new ammount of stock removing the bought items
            	$sql = "UPDATE products SET stock= $stock WHERE id='$id'"; // Update the stock of the current item
			  			$connection->query($sql);
			  			$sql = "DELETE FROM cart WHERE user='$user_id'"; // Remove the current item from the users cart
							$connection->query($sql);
			  		}
			  	}
		  	} else {
		  		echo "<p class='center'> Nothing Purchased</p>
			  	<a href='/s/index.php'><input type='submit' value='Return'></a>
			  	";
		  	}
		  ?>
	  </div>​
  </body>
</html>