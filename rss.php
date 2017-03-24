<?php
    require_once ('Database/db_access.php');
    date_default_timezone_set("Europe/London");
    require_once ('Model/m_wine.php');
    header("Content-type: application/rss+xml");
$rss = updateRSS();
    echo $rss;

?>