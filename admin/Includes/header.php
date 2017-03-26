<?php require_once("Controllers/admin_controller.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ten Green Bottles</title>
    <link rel="stylesheet" href="../Style/main.css" type="text/css" />
    <link rel="stylesheet" href="../Style/element.css" type="text/css" />
    <link rel="stylesheet" href="../Style/responsive.css" type="text/css" />
    <link rel="stylesheet" href="../danger.css" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="navArea">
    <div id="nav">
        <ul id="leftNav">
            <li><a href="../index.php" title="Customer Home Page">Home</a></li>
            <li><a href="admin.php" title="Admin Home Page">Admin Home</a></li>
            <li><a href="aWine.php" title="Wine Management">Wine</a></li>
            <li><a href="aStock.php" title="Stock Control">Stock</a></li>
            <li><a href="aCampaign.php" title="Manage Campaigns">Campaigns</a></li>
            <li><a href="aUser.php" title="Manage all Users">Users</a></li>
        </ul>

        <ul id="rightNav">
            <?php if(isset($_SESSION["Admin"])): ?>
                <li><a href="../sign_out.php" title="Sign out of the current user">LOGOUT</a></li>
            <?php else: ?>
                <li><a href="../sign_in.php" title="Sign in to a registered user">LOGIN - you should never see this message (but just in case)</a></li>
            <?php endif; ?>
        </ul>
    </div>
    <div id="menuButton">
        <button id="menuAction" onclick="toggleMobileNav();" ><i class="fa fa-navicon fa-3x" aria-hidden="true"></i></button>
    </div>
    <div class="mobileNav">
        <ul id="mobileNav">
            <li><a href="../index.php" title="Customer Home Page">Home</a></li>
            <li><a href="admin.php" title="Admin Home Page">Admin Home</a></li>
            <li><a href="aWine.php" title="Wine Management">Wine</a></li>
            <li><a href="aStock.php" title="Stock Control">Stock</a></li>
            <li><a href="aCampaign.php" title="Manage Campaigns">Campaigns</a></li>
            <li><a href="aUser.php" title="Manage all Users">Users</a></li>
            <?php if(isset($_SESSION["Admin"])): ?>
                <li><a href="../sign_out.php" title="Sign out of the current user">LOGOUT</a></li>
            <?php else: ?>
                <li><a href="../sign_in.php" title="Sign in to a registered user">LOGIN - you should never see this message (but just in case)</a></li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<div class="mainArea">

