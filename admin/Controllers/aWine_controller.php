<?php
require_once("Database/db_access.php");
require_once ("../Model/m_wine.php");

$accessCat = [];
$accessCat = getAllCategories();

if (isset($_GET["aCode"]) && $_GET["aCode"] == "filter" && $_GET["wine_type"] != "all") {
    $accessWines = [];
    $accessWines = getAllWinesByCategory($_GET["wine_type"]);
} elseif (isset($_GET["aCode"]) && $_GET["aCode"] == "wine_mod") {
    $accessWines = [];
    $accessWines = getWineById($_GET["wine"]);
} else {
    $accessWines = [];
    $accessWines = getAllWines();
}
if (isset($_POST['aCode'])) {

}
?>