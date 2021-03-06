<?php require_once ("/Includes/header.php"); ?>
<?php require_once ("Controllers/reset_controller.php"); ?>
<?php require_once ("Includes/info.php"); ?>

    <div class="row">
        <div class="col-offset-lg-2 col-lg-8 col-offset-md-1 col-md-10 col-sm-12 formContent">
            <h1>Reset your password</h1>

            <span class="message"><?= $message ?></span>
            <span class="error"><?= $error ?></span>

            <form method="post" action="reset.php">
                <label for="pass1">Enter New Password</label>
                <input type="password" name="pass1" placeholder="Enter New Password" required minlength="8">
                <br><br>
                <label for="pass2">Re-enter New Password</label>
                <input type="password" name="pass2" placeholder="Re-enter New Password" required minlength="8">
                <br><br>
                <input type="hidden" name="iCode" value="change">
                <input type="hidden" name="auth" value="<?= $_GET['auth'] ?>">
                <input type="submit" value="Confirm">
            </form>
        </div>
    </div>

<?php require_once ("Includes/footer.php"); ?>