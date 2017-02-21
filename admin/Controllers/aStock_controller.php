<?php
require_once("Database/db_access.php");
require_once ("../Model/m_wine.php");


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
} else {
    $accessWines = [];
    $accessWines = getAllWines();
}
if (isset($_POST['aCode'])) {
    if ($_POST['aCode'] == "add_stock") {
        $result = addNewStock($_POST['wine'], $_POST['quantity']);
        if ($result) {
            $message = "This delivery of stock has successfully been added to this product";
            unset($_POST);
            header("location: aStock.php?message=1");
        } else {
            $error = "There was an issue updating this product";
        }
    }
}
if (isset($_GET["message"]) && $_GET['message'] = 1) {
    $message = "This delivery of stock has successfully been added to this product";
}
?>