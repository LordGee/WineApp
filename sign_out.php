<?php
    session_start();
    unset($_SESSION["User"]);
    session_destroy();
    $error = "You have successfully logged out.";
    include "sign_in.php";
?>