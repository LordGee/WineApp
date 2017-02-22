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

if (isset($_GET["cart"])){
    $error = "To continue with your order, you are required to login to your account";
} elseif (isset($_GET['message'])) {
    if ($_GET['message'] == 3) {
        $message = "An email has been sent to the email address provided, please follow the instructions to reset your password";
    } elseif ($_GET['message'] == 2) {
        $message = "An email has been sent to the email address provided, please follow the instructions to reset your password!!!";
    } elseif ($_GET['message'] == 1) {
        $message = "You have successfully changed you password";
    }
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
        if ($user[0]->access == 111078) {
            $_SESSION["Admin"] = "Administrator";
        }
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
}  elseif (isset($_POST['iCode']) && $_POST['iCode'] == "forgotten") {
    $customer = getUserByEmail($_POST['email']);
    if ($customer) {
        $name = $customer[0]->first_name . " " . $customer[0]->last_name;
        $auth = createResetAuth($customer[0]->customer_id);
        $setup = addAuthorisation($customer[0]->customer_id, $auth);
        if ($setup) {
            sendResetEmail($auth, $name, $customer[0]->email_address);
            header('Location: sign_in.php?message=2');
        } else {
            $error = "Unable to set the reset credentials, please try later";
        }
    } else {
        // bit cheeky but don't want to throw an error saying the email does not exist...
        header('Location: sign_in.php?message=3');
    }
}

?>