<?php require_once ("Controllers/customer_controller.php"); ?>
<?php require_once ("Includes/header.php"); ?>

    <h1>Login Page</h1>
    <p>Text goes here: </p>
    <span id="error"><?= $error ?></span>
    <form method="post">
        <div>
            <label>Email Address : </label>
            <input type="email" name="email" placeholder="Enter email address here" />
        </div>
        <div>
            <label>Password : </label>
            <input type="password" name="pass" placeholder="Enter password here" />
        </div>
        <div>
            <input type="hidden" name="iCode" value="login" />
            <input type="submit" value="Login" />
        </div>
    </form>


<?php require_once ("Includes/footer.php"); ?>