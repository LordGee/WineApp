<?php require_once ("Includes/header.php"); ?>
<?php require_once ("Controllers/confirm_controller.php"); ?>
<?php require_once ("Includes/info.php"); ?>

    <div class="row">
        <div class="col-offset-lg-2 col-lg-8 col-offset-md-1 col-md-10 col-sm-12 formContent">
            <h1>Confirmation Page</h1>

            <span class="error"><?= $error ?></span>
            <span class="message"><?= $message ?></span>
        </div>
    </div>



<?php require_once ("Includes/footer.php"); ?>