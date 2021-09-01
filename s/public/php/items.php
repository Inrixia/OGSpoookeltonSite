<?php
require "core.php";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$conn = new mysqli('localhost', 'root', 'Sp00ked', 'frosty');
		$id = $_POST['id']; // Set the id for the current product being edited
		$stock = $_POST['stock']; // Set the stock for the current product being edited
		if (isset($_POST['delete'])) { // Delete the product from the database completely (Disabled)
			//$sql = "DELETE FROM products WHERE item_id='$id'";
			//$conn->query($sql);
		} else {
			if (isset($_POST['add'])) { // Add or remove stock for the specific product
				$val = 1;
			} else {
				$val = -1;
			}
				$sql = "UPDATE products SET stock= $stock + $val WHERE id='$id'"; // Update the product's stock
				$conn->query($sql);
			}
		}
?>