<?php require_once("Controllers/main_controller.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ten Green Bottles</title>
    <link rel="stylesheet" href="Style/main.css" type="text/css" />
    <link rel="stylesheet" href="Style/element.css" type="text/css" />
    <link rel="stylesheet" href="Style/responsive.css" type="text/css" />
    <link rel="stylesheet" href="danger.css" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="mainArea">
  <div class="navArea">
    <div id="logo">
        <img src="img/logo.png"/>
        <div>
        <button class="Accessibility" onclick="zoomIn()">Accessibility</button>
    </div>
      <div id="nav">
          <ul id="rightNav">
              <li><a href="index.php" title="Home Page">Home</a></li>
              <li><a href="about.php" title="About Us Page">About Us</a></li>
              <li><a href="wine.php" title="Buy Wine Page">All Wines</a></li>
              <?php if(isset($_SESSION["Customer"])): ?>
                  <?php if (isset($_SESSION["Admin"])): ?>
                      <li><a href="admin/admin.php" title="Administration Page">Admin</a></li>
                  <?php endif; ?>
                  <li><a href="sign_out.php" title="Goodbye">LOGOUT</a></li>
              <?php else: ?>
                  <li><a href="sign_up.php" title="Sign Up now for Great Offers">Register Now</a></li>
                  <li><a href="sign_in.php" title="Login into your Account">LOGIN</a></li>
              <?php endif; ?>
          </ul>
      </div>
      <div id="hamburger">
          <img src="img/hamburger.png" onclick="toggleMobNav();" />
      </div>
      <div class="mobNav">
        <ul id="rightSide">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="wine.php">All Wines</a></li>
            <?php if(isset($_SESSION["Customer"])): ?>
                <?php if (isset($_SESSION["Admin"])): ?>
                    <li><a href="admin/admin.php">Admin</a></li>
                <?php endif; ?>
                <li><a href="sign_out.php">LOGOUT</a></li>
            <?php else: ?>
                <li><a href="sign_up.php">Register Now</a></li>
                <li><a href="sign_in.php">LOGIN</a></li>
            <?php endif; ?>
        </ul>
      </div>
  </div>
