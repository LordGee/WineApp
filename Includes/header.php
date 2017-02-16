<?php require_once("Controllers/main_controller.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ten Green Bottles</title>
    <link rel="stylesheet" href="Style/main.css" type="text/css" />
    <link rel="stylesheet" href="Style/element.css" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<div class="mainArea">
  <div class="navArea">
      <nav>
          <ul id="leftNav">
              <li><a href="index.php">Home</a></li>
              <li><a href="about.php">About Us</a></li>
              <li><a href="wine.php">All Wines</a></li>
          </ul>

          <ul id="rightNav">
              <?php if(isset($_SESSION["Customer"])): ?>
                  <li><a href="sign_out.php">LOGOUT</a></li>
              <?php else: ?>
                  <li><a href="sign_up.php">Register Now</a></li>
                  <li><a href="sign_in.php">LOGIN</a></li>
              <?php endif; ?>
          </ul>
      </nav>
  </div>
    <div id="userInfo">
        <?php if(isset($_SESSION["Customer"])): ?>
            <p>Welcome, <?= $currentUser[0]->first_name ?></p>
        <a href="wine.php?wine_type=showWish&iCode=filter"><p>Wish-List ( <?= count($userWishList) ?> )</p></a>
        <?php endif; ?>
        <?php if(isset($_SESSION["basket"])): ?>
            <a href="cart.php"><p>Shopping Cart ( <?= count($_SESSION["basket"]) ?> )</p></a>
        <?php endif; ?>
    </div>
    <header class="topArea">
        <div id="logo">
            <img src="image/10GreenBottles.png" />
        </div>
    </header>
    <!-- TODO Add a search box here -->
    <div id="contentArea">

