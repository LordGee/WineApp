<?php
    session_start();
    unset($_SESSION["Customer"]);
    session_destroy();
    $error = "You have successfully logged out.";
    include "sign_in.php";
?>