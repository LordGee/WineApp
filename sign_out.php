<?php
    session_start();
    unset($_SESSION["Customer"]);
    session_destroy();
    $message = "You have successfully logged out.";
    include "sign_in.php";
?>