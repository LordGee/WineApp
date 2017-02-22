<?php require_once ("Includes/header.php"); ?>
<?php require_once ("Controllers/customer_controller.php"); ?>


<h1>Request a Password Reset Link</h1>
<p>Enter your email address and we will send you a password reset link to change your password.</p>
<span class="error"><?= $error ?></span>
<span class="message"><?= $message ?></span>
<form method="post" action="forgot.php">
    <div>
        <label>Email Address : </label>
        <input type="email" name="email" placeholder="Enter email address here" required/>
    </div>
    <div>
        <input type="hidden" name="iCode" value="forgotten" />
        <input type="submit" value="Reset" />
    </div>
    <div>
        <p>Not got an account? Register <a href="sign_up.php">HERE</a> </p>
    </div>
</form>


<?php require_once ("Includes/footer.php"); ?>
