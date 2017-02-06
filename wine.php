<?php require_once ("Includes/header.php"); ?>
<?php require_once ("Controllers/wine_controller.php"); ?>



        <?php foreach ($accessWines as $thisWine): ?>
            <div class="wine_rows">
                <div class="wine_img_pos">
                    <img src="<?= $thisWine->asset_link ?>" alt="<?= $thisWine->wine_name ?>" />
                </div>
                <div class="details">
                    <h3 class="wine_name"><?= $thisWine->wine_name ?></h3>
                    <h4><?= $thisWine->country ?></h4>
                    <p><?= $thisWine->description ?></p>
                </div>
            </div>
        <?php endforeach; ?>


        <img src="image/2glass.jpg" alt="Enjoy a little sparkle" title="Click here to explore more." />



<?php require_once ("Includes/footer.php"); ?>