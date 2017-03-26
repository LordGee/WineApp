<?php
    require_once ("Model/m_wine.php");
    require_once ("Model/m_campaign.php");

    $accessCat = [];
    $accessCat = $readObject->getAllCategories();
    $accessWines = [];

    if (isset($_GET["iCode"]) && $_GET["iCode"] == "filter" && $_GET["wine_type"] != "all" && $_GET["wine_type"] != "showWish") {
        $accessWines = $readObject->getAllWinesByCategory($_GET["wine_type"]);
    } elseif (isset($_GET["iCode"]) && $_GET["iCode"] == "filter" && $_GET["wine_type"] == "showWish") {
        $accessWines = $readObject->getAllWinesFromWishList($_SESSION["Customer"]);
    } elseif (isset($_GET["id"])) {
        $accessWines = $readObject->getWineById($_GET["id"]);
    } elseif (isset($_GET["iCode"]) && $_GET['iCode'] == 'one') {
        $accessWines = $readObject->getWineById($_GET["id"]);
    } elseif (isset($_GET["iCode"]) && $_GET["iCode"] == "offer") {
        $accessWines = $readObject->getCampaignItemsById($_GET['offerNo']);
    } elseif (isset($_GET["iCode"]) && $_GET['iCode'] == "filterLvl") {
        $accessWines = $readObject->getWineByTaste($_GET['lvl']);
    } else {
        $accessWines = $readObject->getAllWines();
    }
    if (isset($_POST['iCode'])) {
        if ($_POST["iCode"] == "wish") {
            $check = $readObject->getWineInWishList($_POST["wId"], $_SESSION["Customer"]);
            if ($check) {
                $success = $createObject->addWineToWishList($_POST["wId"], $_SESSION["Customer"]);
                if ($success) {
                    $message = "This wine has successfully been ADDED to your Wish-List";
                } else {
                    $error = "There was a problem adding this item to your Wish-List, please try again later";
                }
            } else {
                $error = " This wine is already in your Wish-List";
            }
        } elseif ($_POST['iCode'] == "removeWish") {
            $result = $deleteObject->removeWineFromWishList($_POST["wId"], $_SESSION["Customer"]);
            if ($result) {
                $message = "This wine has successfully REMOVED from your Wish-List";
            } else {
                $error = "There was a problem removing this item from your Wish-List, please try again later";
            }
        } elseif ($_POST['iCode'] == "addBasket") {
            addBasket($_POST['wId'], $_POST['qty']);

        } elseif ($_POST['iCode'] == "removeBasket") {
            removeBasket($_POST["wId"]);
        }
    }
?>