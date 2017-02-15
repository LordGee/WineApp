<?php
require_once ("Includes/session.php");
require_once("Database/db_access.php");
require_once ("Model/m_customer.php");
require_once ("Model/m_wish_list.php");

if (!isset($error)) {
    $error = "";
}
if (!isset($message)) {
    $message = "";
}

if (isset($_SESSION["Customer"])) {
    $currentUser = [];
    $currentUser = getUserById($_SESSION["Customer"]);
    $userWishList = [];
    $userWishList = getAllWishListById($_SESSION["Customer"]);
}
?>


