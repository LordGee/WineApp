<?php
require_once("Database/db_access.php");
require_once ("../Model/m_customer.php");
require_once ("../Model/m_customer_order.php");


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
        $customers = $readObject->getCustomerByName($name);
    } elseif ($_GET['aCode'] == 'order_details') {
        $order_lines = [];
        $order_lines = $readObject->getOrderLinesByOrderId($_GET['id']);
    }
} else {
    $customers = [];
    $customers = $readObject->getAllUsers();
}
if (isset($_POST['aCode'])) {
    if ($_POST['aCode'] == 'details') {
        $customer = [];
        $customer = $readObject->getUserById($_POST['customer']);
        $address = [];
        $address = $readObject->getAddressById($customer[0]->address_id_fk);
        $orders = [];
        $orders = $readObject->getAllOrdersByCustomerId($customer[0]->customer_id);
    } elseif ($_POST['aCode'] == "email_reset") {
        $auth = createResetAuth($_POST['id']);
        $setup = $updateObject->setAuthorisation($_POST['id'], $auth);
        if ($setup) {
            sendResetEmail($auth, $_POST['name'], $_POST['email']);
            $message = "An email has been sent to the customer with details on how to reset their password";
        } else {
            $error = "Unable to set the reset credentials, please try later";
        }
    } elseif ($_POST['aCode'] == "set_admin") {
        if (isset($_POST['admin'])) {
            $magic = 111078;
            $admin = $updateObject->setUserAsAdmin($magic, $_POST['id']);
        } else {
            $magic = 0;
            $admin = $updateObject->setUserAsAdmin($magic, $_POST['id']);
        }
    }
}
if (isset($_GET["message"]) && $_GET['message'] = 1) {
    $message = "";
}
?>