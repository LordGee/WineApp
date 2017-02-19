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
        if ($_POST["iCode"] == "addAddress") {
            $allUsed = getAllUsedAddressesByCustomerId($_SESSION["Customer"]);
        } elseif ($_POST["iCode"] == "choose") {
            if ($_POST["selectAddress"] != "add") {
                $_SESSION["address"] = $_POST["selectAddress"];
            } else {
                $_SESSION["address"] = 0;
            }
            $allUsed = getAllUsedAddressesByCustomerId($_SESSION["Customer"]);
            $chooseAddress = getAddressById($_SESSION["address"]);
            if (!$chooseAddress) {
                $chooseAddress[0] = null;
            }
        } elseif ($_POST['iCode'] == "use") {
            $check = checkAddress($_POST['door_number_name'], $_POST['post_code']);
            if ($check) {
                $_SESSION["address"] = $check[0]->address_id;
            } else {
                $_SESSION["address"] = insertFullAddress($_POST);
            }
            header('Location: cart.php');
        }
    }
?>