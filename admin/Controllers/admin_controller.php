<?php
require_once ("../Includes/session.php");
date_default_timezone_set("Europe/London");
require_once("Database/db_access.php");
require_once ("../Model/m_customer.php");

if (!isset($error)) {
    $error = "";
}
if (!isset($message)) {
    $message = "";
}

if (isset($_SESSION["Admin"])) {
    if (isset($_SESSION["Customer"])) {
        $currentUser = [];
        $currentUser = $readObject->getUserById($_SESSION["Customer"]);
    } else {
        header("location: ../index.php");
        die();
    }
    if ($currentUser[0]->access != 111078) {
        header("location: ../index.php");
        die();
    }
} else {
    header("location: ../index.php");
    die();
}
?>