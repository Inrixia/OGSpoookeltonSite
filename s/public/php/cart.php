<?php
require "core.php";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if ($_SESSION['user'] != '') { // If an user is logged in
			$conn = new mysqli('localhost', 'root', 'Sp00ked', 'frosty');
			if (isset($_GET['id'])) { // Depending on how this file is accessed set the id variable (Of the item being editied from the cart)
				$id = $_GET['id'];
			} else {
				$id = $_POST['id'];
			}
			
			$user_id = $_SESSION['user'];
			$sql = "SELECT ammount FROM cart WHERE user='$user_id' AND item_id='$id'"; // Get the ammount of the specific item
			$result = $conn->query($sql);
			if (isset($_POST['delete'])) { // If the user is removing the item from the cart
				$sql = "DELETE FROM cart WHERE user='$user_id' AND item_id='$id'"; // Remove the item from the cart
				$conn->query($sql);
			} else {
				if (isset($_POST['add'])) { // If the user is adding to their cart set the val to 1 else -1
					$val = 1;
				} else {
					$val = -1;
				}
				$row = $result->fetch_array();
				if($result->num_rows === 0 && $val == 1){ // If the user hasnt added the item to their cart yet and they are adding, then insert the item
					$sql = "INSERT INTO cart (user, item_id, ammount) VALUES ('$user_id', '$id', '1')";
					$conn->query($sql);
				} elseif ($row['ammount'] == 1 && $val == -1) { // If only one of the item is left in the cart and they are removing then delete it from the cart
					$sql = "DELETE FROM cart WHERE user='$user_id' AND item_id='$id'";
					$conn->query($sql);
				} elseif ($row['ammount'] >= 1) { // If their is more than one of the item in the cart then add/remove depending on $val
					$sql = "UPDATE cart SET ammount= ammount + $val WHERE user='$user_id' AND item_id='$id'";
					$conn->query($sql);
				}
			}
		} else {
			echoErr("Please Login to change your cart"); // If trying to edit cart whilst not logged in throw error (Function in core)
		}
	}
?>