<?php
require_once("Database/db_access.php");
require_once ("../Model/m_wine.php");
require_once ("Controllers/upload_controller.php");

if (!isset($error)) {
    $error = "";
}
if (!isset($message)) {
    $message = "";
}

$accessCat = [];
$accessCat = getAllCategories();

if (isset($_GET["aCode"]) && $_GET["aCode"] == "filter" && $_GET["wine_type"] != "all") {
    $accessWines = [];
    $accessWines = getAllWinesByCategory($_GET["wine_type"]);
    $message = "You selection has now been filtered.";
} elseif (isset($_GET["aCode"]) && $_GET["aCode"] == "wine_mod") {
    $accessWines = [];
    $accessWines = getWineById($_GET["wine"]);
    $message = "Modify your selected product here, once the update button is clicked the changes will take effect immediately.";
} else {
    $accessWines = [];
    $accessWines = getAllWines();
}
if (isset($_POST['aCode'])) {
    if ($_POST['aCode'] == "update") {
        if (isset($_POST['cancel']) && $_POST['cancel'] == "Cancel") {
            header("location: aWine.php");
        } elseif ($_POST['update'] == "Update") {
            if ($_FILES['asset_link'] != null) {
                $asset = uploadPicture();
            } else {
                $asset = $_POST["asset_current"];
            }
            $result = updateWine($_POST["wine"], $_POST["wine_name"], $_POST["country"], $_POST["bottle_size"], $_POST["description"], $_POST["price_per_bottle"], $asset, $_POST["category"]);
            if ($result) {
                unset($_POST);
                header("location: aWine.php?message=1");
            } else {
                $error = "There was an issue updating this product, please try again.";
            }
        }
    } elseif ($_POST['aCode'] == "add") {
        if (isset($_POST['cancel']) && $_POST['cancel'] == "Cancel") {
            header("location: aWine.php");
        } elseif ($_POST['add'] == "Add Wine") {
            if ($_FILES['asset_link'] != null) {
                $asset = uploadPicture();
            } else {
                $asset = null;
            }
            $result = insertWine($_POST["wine_name"], $_POST["country"], $_POST["bottle_size"], $_POST["description"], $_POST["price_per_bottle"], $asset, $_POST["category"]);
            if ($result) {
                $addStock = addStockRelationship($result);
                if ($addStock != null) {
                    // updateRSS();
                    unset($_POST);
                    header("location: aWine.php?message=2");
                } else {
                    $error = "There was an issue updating the relationship between the stock control system";
                }
            } else {
                $error = "There was an issue updating this product, please try again.";
            }
        }
    }
}
if (isset($_GET["message"]) && $_GET['message'] = 1) {
    $message = "Your product has successfully been updated.";
} elseif (isset($_GET["message"]) && $_GET['message'] = 2) {
    $message = "Your product has successfully been updated.";
}
?>