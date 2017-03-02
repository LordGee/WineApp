<?php require_once("Controllers/admin_controller.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ten Green Bottles</title>
    <link rel="stylesheet" href="../Style/main.css" type="text/css" />
    <link rel="stylesheet" href="../Style/element.css" type="text/css" />
    <link rel="stylesheet" href="../Style/responsive.css" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<div class="mainArea">
    <div class="navArea">
        <nav>
            <ul id="leftNav">
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
        </nav>
    </div>
