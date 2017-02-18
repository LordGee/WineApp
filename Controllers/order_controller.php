<?php
require_once("Database/db_access.php");
require_once ("Model/m_customer.php");
require_once ("Model/m_wine.php");

if (!isset($error)) {
    $error = "";
}
if (!isset($message)) {
    $message = "";
}

if (isset($_SESSION["Customer"]) && $_SESSION["total"]) {
    $userPayment = [];
    $userPayment = getPaymentsById($_SESSION["Customer"]);
    if (isset($_POST['iCode'])) {
        if ($_POST['iCode'] == "order") {
            $_SESSION['address'] = $_POST['address'];
        } elseif ($_POST['iCode'] == "addCard") {
            $result = addPayment($_POST);
            if ($result) {
                $message = "New card haas successfully been added";
                unset($_POST);
            } else {
                $error = "There was an issue adding your card";
            }
        }
    }
} else {
    header('Location: sign_in.php?cart=1');
    die();
}

?>