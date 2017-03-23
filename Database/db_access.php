<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // LocalHost Connection Variables
    $db_host = "localhost";
    $db_user = "wine_user";
    $db_name = "wine_app";
    $db_pass = "paulNeve";
    try {
        $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $ex) {
        echo 'CONNECTION ERROR: ' . $ex->getMessage();
    }

// Live Connection Variables
//    $db_host = "localhost";
//    $db_user = "mychaosc_wine";
//    $db_name = "mychaosc_awad";
//    $db_pass = "p4ulN3v32017";
//    try {
//        $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
//        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
//    } catch(PDOException $ex) {
//        echo 'CONNECTION ERROR: ' . $ex->getMessage();
//    }

    require_once ("Database/db_Create.php");
    require_once ("Database/db_Read.php");
    require_once ("Database/db_Update.php");
    require_once ("Database/db_Delete.php");

?>