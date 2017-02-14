<?php require_once("Controllers/main_controller.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ten Green Bottles</title>
    <link rel="stylesheet" href="Style/main.css" type="text/css" />
    <link rel="stylesheet" href="Style/element.css" type="text/css" />
</head>
<body>
<div class="mainArea">
  <div class="navArea">
      <nav >
          <ul id="leftNav">
              <li><a href="index.php">Home</a></li>
              <li><a href="about.php">About Us</a></li>
              <li><a href="wine.php">All Wines</a></li>
          </ul>
          <ul id="rightNav">
              <li><a href="sign_up.php">Register Now</a></li>
              <?php if(isset($_SESSION["Customer"])): ?>
              <li><a href="sign_out.php">LOGOUT</a></li>
              <?php else: ?>
              <li><a href="sign_in.php">LOGIN</a></li>
              <?php endif; ?>
          </ul>
      </nav>
  </div>
    <header class="topArea">
        <div id="logo">
            <img src="image/10GreenBottles.png" style = "position: relative; bottom: 50px;"/>
        </div>
    </header>
    <div id="contentArea">
