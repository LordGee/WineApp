<?php
    header('Content-Type: application/json; charset=utf-8');
    require_once("Database/db_access.php");
    require_once("Model/m_wine.php");
    if (isset($_REQUEST['value'])) {
        $wine = $_REQUEST['value'];
        echo getWineLikeNameJson($wine);
        if (json_last_error() != 0) {
            echo json_last_error_msg();
        }
    } else {
        echo "No request found";
    }
?>