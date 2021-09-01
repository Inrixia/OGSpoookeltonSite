<?php
require "public/php/cart.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Joe's Frosty Donuts</title>
    <link rel="shortcut icon" href="public/img/logo-small.png"/>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link href="public/css/main.css" rel="stylesheet">
    <link href="public/css/cart.css" rel="stylesheet">
    <link href="public/css/item.css" rel="stylesheet">
    <link href="public/css/button.css" rel="stylesheet">
  </head>
  <body>
  <div class="site-img-header"><img class="logoimg" src="public/img/logo-text.png"></div>
    <div class="nav-wrapper">
      <div class="wrapper-nav">
        <nav class="nav-cont-wrapper navbar">
          <ul class="nav navbar-nav">
            <li><a href="/s/index.php">Donuts</a></li>
            <li><a href="/s/faq.php">FAQ</a></li>
          </ul>
        </nav>
      </div>
      <?php
      if ($_SESSION['loggedin'] == true) { // If the user is logged in, display the user account button and cart, if not just display the login
        $user_id = $_SESSION['user'];
        $connection = new mysqli('localhost', 'root', 'Sp00ked', 'frosty');
        $sql = "SELECT * FROM cart WHERE user='$user_id'"; // Gets the number of items from the users cart for the cart button on navbar
        $result = $connection->query($sql);
        $num_rows = mysqli_num_rows($result);
        echo ("
          <ul class='nav navbar-right top-nav'>
            <li>
              <a href='/s/cart.php' class='dropdown-toggle'><i class='fa fa-fw fa-shopping-cart'></i> Cart ($num_rows)</a>
            </li>
            <li class='dropdown'>
              <a href='#' class='dropdown-toggle' data-toggle='dropdown'><i class='fa fa-user'></i> $user_id <b class='caret'></b></a>
              <ul class='dropdown-menu'>
                <li>
                  <a href='/s/account/account.php'><i class='fa fa-fw fa-gear'></i> Profile</a>
                </li>
                <li>
                  <a href='/s/logout.php'><i class='fa fa-fw fa-power-off'></i> Log Out</a>
                </li>
              </ul>
            </li>
          </ul>
        ");
      } else { // If the user isnt logged in
        echo ("
          <ul class='nav navbar-right top-nav'>
            <li class='dropdown'>
              <a href='/s/login'><i class='login-button fa fa-fw fa-gear'></i> Login</a>
            </li>
          </ul>
        ");
      }
      ?>
    </div>
    <div class="content">
      <?php
        $user_id = $_SESSION['user'];
        $sql = "SELECT * FROM cart WHERE user='$user_id'"; // Gets everything from the users cart
        if (!$resultt = $connection->query($sql)) {}
        $num_rows = mysqli_num_rows($resultt); // Gets the number of items in the users cart
        echo "<table>"; // Start the cart table
        if ($num_rows > 0) { // If the cart isnt empty display cart info
          echo "<tr><th class='heading'>Your Cart - ($num_rows)</th></tr>
          ";
          echo "<tr>
          <th></th>
          <th>Product Name</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Total</th>
          </tr>
          ";
          $overtotal = ''; // Defines the total variable
          while ($roww = $resultt->fetch_array()) { // For each item in the users cart run the following code
            $id = $roww['item_id']; // Set id to the item id of the item from the cart currently selected
            $sql = "SELECT * FROM products WHERE id='$id'"; // Pull all info about that item from the products table
            if (!$result = $connection->query($sql)) {}
            while ($row = $result->fetch_array()) { // Display that item with all its details and buttons in a row in the cart table
              $img = "public/img/items/".$row['image_name'];
              $id = $row['id'];
              $ammount = $roww['ammount'];
              $name = $row['name'];
              $price = $row['price'];
              $stock = $row['stock'];
              $total = ($ammount * $price); // Gets the total cost for this specific item by multiplying its base cost by the ammount in cart
              $overtotal = ($overtotal + $total); // Adds the total cost for this item to the overall total for the cart
              echo "<tr><th class='imgcont'><a href='/s/item.php?id=$id'><div class='item'>
              <img src='$img' align='center' class='item'/></th>
              <th><h3>$name</h3></th>
              <th class='cost'>$$price<h4></h4>
              ";
              if ($stock > -1) { 
                echo "<span class='cart label label-default'>$stock In stock</span></th>
                ";
              } else { // If the item is out of stock then it shows out of stock
                echo "<span class='cart label label-default'>Out of Stock!</span></th>
                ";
              }
              echo "<th class='cost'>
                <h4>$ammount</h4>
                <form action='' method='post'>";
              if (($stock - $ammount) > 0) {
                echo "<input type='submit' class='button-add butt' name='add' value='+'>
                ";
              } else { //Greys the add button when the items added to cart are equal to stoc
                echo "<input type='submit' class='button-add butt grey' name='grey' value='+'>
                ";
              }
              echo "<input type='submit' class='button-remove butt' name='remove' value='-'>
                  <input type='submit' class='button-delete butt' name='delete' value='Remove'>
              ";
              echo "<input style='display: none;' name='id' value='$id'>
                </form>
              </th>
              <th class='cost'>$$total<h4></h4></th>
              </div></a></tr>
              ";
            }
          } // Below adds spacing, the final totals and purchase buttons
          echo "<tr>
            <th class='hiding'></th>
            <th class='hiding'></th>
            <th class='hiding'></th>
            <th class='sum'><h3>Subtotal</h3></th>
            <th class='sum overtotal'><h3>$$overtotal</h3></th>
            </tr>
            </table>
            <form align='right' action='/s/buy.php' method='post'>
              <input type='submit' class='butt button-buy' name='buy' value='Checkout'>
              <input style='display: none;' name='total' value='$overtotal'>
            </form>
          ";
        } else { // If theirs nothing in the cart just show the no cart image :P
          echo "<img class='nocart' src='public/img/no-cart.png'>
          ";
        }
      ?>
    </div>
  </body>
</html>