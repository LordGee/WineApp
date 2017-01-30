<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $db_host = "localhost";
    $db_user = "wine";
    $db_name = "wine_app";
    $db_pass = "paul";

    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name",$db_user,$db_pass);

?>