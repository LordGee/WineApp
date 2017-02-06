<?php

    require_once("Database/db_access.php");
    require_once ("Model/m_wine.php");
    require_once ("Includes/session.php");

    $accessWines = [];
    $accessWines = getAllWines();


?>