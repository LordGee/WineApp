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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<div class="mainArea">
  <div class="navArea">
    <div id="logo">
        <img src="img/logo.png" />
    </div>
      <div id="nav">
          <ul id="rightNav">
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
      <div class="mainArea">
    <div class="mobNav">
      <div id="hamburger">
          <img src="img/hamburger.png" />
      </div>
<div id="mobNav">
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
