<?php
    header('Content-Type: application/json');
    require_once ("db_access.php");
    require_once ("../Model/m_wine.php");
    $wine = $_REQUEST['wine_name'];
    echo getWinesByNameJson($wine);

?>