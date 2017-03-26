<?php
require_once ("Includes/session.php");
require_once("Database/db_access.php");
require_once ("Model/m_customer.php");
require_once ("Model/m_wine.php");

if (!isset($error)) {
    $error = "";
}
if (!isset($message)) {
    $message = "";
}

if (isset($_POST["btn"]) && $_POST["btn"] == "Update") {
    updateBasket($_POST["wId"], $_POST["quantity"]);
} elseif (isset($_POST["btn"]) && $_POST["btn"] == "Remove") {
    removeBasket($_POST['wId']);
}

if (isset($_SESSION["Customer"])) {
    $userAddress = [];
    if (isset($_SESSION["address"])) {
        $userAddress = $readObject->getAddressById($_SESSION['address']);
        unset($_SESSION["address"]);
    } else {
        $userAddress = $readObject->getAddressById($currentUser[0]->address_id_fk);
    }
    $accessWines = [];
    $accessWines = $readObject->getAllWines();
    $_SESSION["total"] = getTotalValue();
} else {
    header('Location: sign_in.php?cart=1');
    die();
}

?>