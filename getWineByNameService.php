<?php
    header('Content-Type: application/json');
    require_once("Database/db_access.php");
    require_once("Model/m_wine.php");
    if (isset($_REQUEST['value'])) {
        $wine = $_REQUEST['value'];
        echo getWineLikeNameJson($wine);
    } else {
        echo "No request found";
    }
?>