<?php
require_once ("Includes/session.php");
require_once("Database/db_access.php");
require_once ("Model/m_customer.php");
if (!isset($error)) {
    $error = "";
}

if (isset($_SESSION["Customer"])) {
    $currentUser = [];
    $currentUser = getUserById($_SESSION["Customer"]);
}
?>


