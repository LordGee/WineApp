<?php
    require_once ("Model/m_wine.php");

    $accessCat = [];
    $accessCat = getAllCategories();

    if (isset($_GET["iCode"]) && $_GET["iCode"] == "filter" && $_GET["wine_type"] != "all" && $_GET["wine_type"] != "showWish") {
        $accessWines = [];
        $accessWines = getAllWinesByCategory($_GET["wine_type"]);
    } elseif (isset($_GET["iCode"]) && $_GET["iCode"] == "filter" && $_GET["wine_type"] == "showWish") {
        $accessWines = [];
        $accessWines = getAllWinesFromWishList($_SESSION["Customer"]);
    } else {
        $accessWines = [];
        $accessWines = getAllWines();
    }
    if (isset($_POST['iCode'])) {
        if ($_POST["iCode"] == "wish") {
            $check = checkWineInWishList($_POST["wId"], $_SESSION["Customer"]);
            if ($check) {
                $success = addWineToWishList($_POST["wId"], $_SESSION["Customer"]);
                if ($success) {
                    $message = "This wine has successfully been ADDED to your Wish-List";
                } else {
                    $error = "There was a problem adding this item to your Wish-List, please try again later";
                }
            } else {
                $error = " This wine is already in your Wish-List";
            }
        } elseif ($_POST['iCode'] == "removeWish") {
            $result = removeWineFromWishList($_POST["wId"], $_SESSION["Customer"]);
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