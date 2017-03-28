<?php require_once ("Includes/header.php");
?>
<?php require_once ("Controllers/customer_controller.php"); ?>
<?php require_once ("Includes/info.php"); ?>


<div class="row">
    <div class="col-offset-lg-2 col-lg-8 col-offset-md-1 col-md-10 col-sm-12 formContent">
        <h1>Register for a new account</h1>
        <p>Get 25% off your first order (Subject to terms and conditions)</p>
        <form method="post" action="sign_up.php">
            <label for="first_name">First Name : </label>
            <input type="text" name="first_name" id="first_name">
            <br><br>
            <label for="last_name">Last Name : </label>
            <input type="text" name="last_name" id="last_name">
            <br><br>
            <label for="email_address">Email Address : </label>
            <input type="email" name="email_address" id="email_address">
            <br><br>
            <label for="password">Password : </label>
            <input type="password" name="password" id="password">
            <br><br>
            <label for="phone_number">Phone Number : </label>
            <input type="text" name="phone_number" id="phone_number">
            <br><br>
            <label for="door_number_name">Door Number : </label>
            <input type="text" name="door_number_name" id="door_number_name" required>
            <br><br>
            <label for="post_code">Post Code : </label>
            <input type="text" name="post_code" id="post_code" required>
            <br><br>
            <input type="hidden" name="iCode" value="register">
            <input type="submit" value="Register Now">
        </form>
    </div>
</div>
<?php require_once ("Includes/footer.php"); ?>
