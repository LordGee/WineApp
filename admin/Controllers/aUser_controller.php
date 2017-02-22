<?php
require_once("Database/db_access.php");
require_once ("../Model/m_customer.php");


if (!isset($error)) {
    $error = "";
}
if (!isset($message)) {
    $message = "";
}


if (isset($_GET["aCode"])) {
    if ($_GET['aCode'] == "search") {
        $name = "%" . $_GET['customer_name'] . "%";
        $customers = [];
        $customers = searchCustomerByName($name);
    }
} else {
    $customers = [];
    $customers = getAllUsers();
}
if (isset($_POST['aCode'])) {
    if ($_POST['aCode'] == 'details') {
        $customer = [];
        $customer = getUserById($_POST['customer']);
    } elseif ($_POST['aCode'] == "email_reset") {
        $auth = createResetAuth($_POST['id']);
        $setup = addAuthorisation($_POST['id'], $auth);
        if ($setup) {
            sendResetEmail($auth, $_POST['name'], $_POST['email']);
            $message = "An email has been sent to the customer with details on how to reset their password";
        } else {
            $error = "Unable to set the reset credentials, please try later";
        }
    }
}
if (isset($_GET["message"]) && $_GET['message'] = 1) {
    $message = "";
}
?>