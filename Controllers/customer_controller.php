<?php
require_once ("Controllers/db_access.php");
require_once ("Model/m_customer.php");
require_once ("Includes/session.php");

if (!isset($error))
{
    $error = "";
}

if (isset($_SESSION["activeUser"]))
{
    header('Location: index.php');
    die();
}
else if (isset($_POST["iCode"]) && $_POST["iCode"] == "login")
{
    $email = $_POST["email_address"];
    $pass = $_POST["password"];
    $user = getUserByEmailAndPassword($email,$pass);
    if ($user)
    {
        $_SESSION["loggedInUser"] = $user;
        header('Location: index.php');
        die();
    }
    else
    {
        $error = "The login details supplied do not match any valid user.";
    }
}
?>