<?php
require_once("Database/db_access.php");
require_once ("Model/m_customer.php");


if (!isset($error)) {
    $error = "";
}
if (!isset($message)) {
    $message = "";
}

if (isset($_GET["auth"])) {
    $customer = getUserByAuthCode($_GET['auth']);
    if ($customer) {
        $_SESSION['auth'] = $_GET['auth'];
        $message = "You may change your password here {$customer[0]->first_name}";
    } else {
        header("location: index.php");
        die();
    }
} elseif (isset($_POST['iCode']) && $_POST['iCode'] == 'change') {
    $check = checkPasswordsMatch ($_POST['pass1'], $_POST['pass2']);
    if ($check) {
        $customer = getUserByAuthCode($_SESSION['auth']);
        if ($customer) {
            $encryptPass = encryption($customer[0]->email_address, $_POST['pass1']);
            $change = updatePassword($encryptPass, $_SESSION['auth'], $customer[0]->customer_id);
            if ($change) {
                removeAuthorisation($customer[0]->customer_id);
                unset($_SESSION['auth']);
                header("location: sign_in.php?message=1");
            } else {
                header("location: reset.php?error=2&auth={$_SESSION['auth']}");
            }
        } else {
            header("location: reset.php?error=2&auth={$_SESSION['auth']}");
        }
    } else {
        header("location: reset.php?error=1&auth={$_SESSION['auth']}");
    }
} else {
    header("location: index.php");
    die();
}



if (isset($_GET['error'])) {
    if ($_GET['error'] == 2) {
        $error = "Unable to change password";
    } elseif ($_GET['error'] == 1) {
        $error = "Passwords do not match";
    }
}
?>