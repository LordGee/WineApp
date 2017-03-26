<?php require_once ("Controllers/customer_controller.php"); ?>
<?php require_once ("Includes/header.php"); ?>
<?php require_once ("Includes/info.php"); ?>

    <h1>Login Page</h1>
    <p>Text goes here: </p>
    <span class="error"><?= $error ?></span>
    <span class="message"><?= $message ?></span>
    <form method="post">
      <div class = "contentLogin">
        <div>
            <label>Email Address : </label>
            <input type="email" name="email" placeholder="Enter email address here" /><br/><br/>
        </div>
        <div>
            <label>Password : </label>
            <input type="password" name="pass" placeholder="Enter password here" /><br/><br/>
        </div>
        <div>
            <input type="hidden" name="iCode" value="login" /><br/>
            <input type="submit" value="Login" />
        </div>
        <div>
            <p>Not got an account? Register <a href="sign_up.php">HERE</a> </p>
            <p>Forgotten your password <a href="forgot.php">Click HERE</a> to reset</p>
        </div
      </div>
    </form>

<?php require_once ("Includes/footer.php"); ?>
