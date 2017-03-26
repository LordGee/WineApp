<?php require_once ("Includes/header.php"); ?>
<?php require_once ("Controllers/customer_controller.php"); ?>
<?php require_once ("Includes/info.php"); ?>

<div class="row">
    <div class="col-offset-lg-2 col-lg-8 col-offset-md-1 col-md-10 col-sm-12 formContent">
        <h1>Request a Password Reset Link</h1>
        <p>Enter your email address and we will send you a password reset link to change your password.</p>
        <span class="error"><?= $error ?></span>
        <span class="message"><?= $message ?></span>
        <form method="post" action="forgot.php">
            <label>Email Address : </label>
            <input type="email" name="email" placeholder="Enter email address here" required/>
            <br><br>
            <input type="hidden" name="iCode" value="forgotten" />
            <input type="submit" value="Reset" />
            <br><br>
            <p>Not got an account? Register <a href="sign_up.php">HERE</a> </p>
        </form>
    </div>
</div>


<?php require_once ("Includes/footer.php"); ?>
