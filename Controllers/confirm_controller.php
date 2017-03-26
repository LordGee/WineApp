<?php
require_once("Database/db_access.php");
require_once("Model/m_customer.php");
require_once("Model/m_wine.php");
require_once("Model/m_customer_order.php");

if (!isset($error)) {
    $error = "";
}
if (!isset($message)) {
    $message = "";
}

if (isset($_SESSION["Customer"]) && isset($_SESSION["total"]) && isset($_SESSION["address"]) && isset($_SESSION["basket"]) && isset($_SESSION["basketQty"])) {
    if (isset($_POST['iCode'])) {
        if ($_POST["iCode"] == "complete") {
            $_SESSION["payment"] = $_POST["card"];
            $order_id = $createObject->addNewOrder($_SESSION["Customer"], $_SESSION["total"], $_SESSION["payment"], $_SESSION["address"]);
            foreach ($_SESSION["basket"] as $bKey => $bValue) {
                foreach ($_SESSION["basketQty"] as $qKey => $qValue) {
                    if ($bValue == $qKey) {
                        $wine = $readObject->getWineById($bValue);
                        $line_value = $wine[0]->price_per_bottle * $qValue;
                        $result = $createObject->addNewOrderLines($order_id, $line_value, $bValue, $qValue);
                        if (!$result) {
                            $error = "The was an issue placing your order";
                        }
                        $updateObject->updateStockAfterSale($bValue, $qValue);
                    }
                }
            }
        }
        if ($error === "") {
            $message = "Your order was placed successfully, Thank-You for your purchase.";
            unset($_SESSION["total"]);
            unset($_SESSION["address"]);
            unset($_SESSION["basket"]);
            unset($_SESSION["basketQty"]);
            unset($_SESSION["payment"]);
        }
    }
} else {
    header('Location: sign_in.php?cart=1');
    die();
}
?>