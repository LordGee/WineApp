<?php require_once ("Controllers/customer_controller.php"); ?>
<?php require_once ("Includes/header.php"); ?>
<?php require_once ("Includes/info.php"); ?>

    <div class="row">
        <div class="col-offset-lg-2 col-lg-8 col-offset-md-1 col-md-10 col-sm-12 formContent">
            <h1>Login Page</h1>
            <span class="error"><?= $error ?></span>
            <span class="message"><?= $message ?></span>
            <form method="post">
                <label>Email Address : </label>
                <input type="email" name="email" placeholder="Enter email address here" />
                <br><br>
                <label>Password : </label>
                <input type="password" name="pass" placeholder="Enter password here" />
                <br><br>
                <input type="hidden" name="iCode" value="login" />
                <input type="submit" value="Login" />
                <br><br>
                <p>Not got an account? Register <a href="sign_up.php">HERE</a> </p>
                <p>Forgotten your password <a href="forgot.php">Click HERE</a> to reset</p>
            </form>
        </div>
    </div>
<?php require_once ("Includes/footer.php"); ?>
