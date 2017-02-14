<?php
    require_once ("Includes/session.php");
    require_once("Database/db_access.php");
    require_once ("Model/m_wine.php");




    $accessCat = [];
    $accessCat = getAllCategories();

    if (isset($_GET["iCode"]) && $_GET["iCode"] == "filter" && $_GET["wine_type"] != "all") {
        $accessWines = [];
        $accessWines = getAllWinesByCategory($_GET["wine_type"]);
    } else {
        $accessWines = [];
        $accessWines = getAllWines();
    }
?>