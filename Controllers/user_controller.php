<?php
    require_once ("Includes/session.php");
    require_once ("Model/m_customer.php");
    require_once ("Database/db_access.php");

    if (!isset($error)) {
        $error = "";
    }
    if (!isset($message)) {
        $message = "";
    }

    if (isset($_POST["iCode"])) {
        if ($_POST["iCode"] == "addAdress") {

        }
    }




?>