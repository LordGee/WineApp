<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Connection Variables
    $db_host = "localhost";
    $db_user = "wine_user";
    $db_name = "wine_app";
    $db_pass = "paulNeve";

    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name",$db_user,$db_pass);

    require_once ("Database/db_Create.php");
    require_once ("Database/db_Read.php");
    require_once ("Database/db_Update.php");
    require_once ("Database/db_Delete.php");

?>