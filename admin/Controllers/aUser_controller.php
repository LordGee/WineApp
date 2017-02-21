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
    }
}
if (isset($_GET["message"]) && $_GET['message'] = 1) {
    $message = "";
}
?>