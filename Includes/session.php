<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
        $currentUser = false;
        if (isset($_SESSION["User"])) {
            $currentUser = $_SESSION["User"];
        }
    }
?>