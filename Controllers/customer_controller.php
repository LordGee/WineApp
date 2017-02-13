<?php
require_once ("Database/db_access.php");
require_once ("Model/m_customer.php");
require_once ("Includes/session.php");

if (!isset($error)) {
    $error = "";
}

if (isset($_SESSION["User"])) {
    header('Location: index.php');
    die();
} else if (isset($_POST["iCode"]) && $_POST["iCode"] == "login") {
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $user = getUserByEmailAndPassword($email,$pass);
    if ($user) {
        $_SESSION["User"] = $user;
        $_SESSION["blah"] = "Blah, Blah, Blah!";
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
            $_SESSION["UserId"] = $customerId;
            header('Location: sign_in.php');
            die();
        } else {
            $error = "Unable to create new customer";
        }
    }
    return $error;
}
?>