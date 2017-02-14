<?php
require_once ("Includes/session.php");
require_once ("Model/m_customer.php");
require_once ("Database/db_access.php");

if (!isset($error)) {
    $error = "";
}

if (isset($_SESSION["Customer"])) {
    header('Location: index.php');
    die();
} else if (isset($_POST["iCode"]) && $_POST["iCode"] == "login") {
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $user = getUserByEmailAndPassword($email,$pass);
    if ($user) {
        $_SESSION["Customer"] = $user[0]->customer_id;
        header('Location: index.php');
        die();
    } else {
        $error = "The login details supplied do not match any valid user.";
    }
} else if (isset($_POST["iCode"]) && $_POST["iCode"] == "register") {
    $addressId = insertAddress($_POST);
    if (!$addressId) {
        $error = "Unable to insert new address";
    } else {
        $passEncrypt = encryption($_POST['email_address'], $_POST['password']);
        $customerId = insertCustomer($_POST, $passEncrypt, $addressId);
        if ($customerId) {
            $_SESSION["Us"] = $customerId;
            header('Location: sign_in.php');
            die();
        } else {
            $error = "Unable to create new customer";
        }
    }
    return $error;
}
?>