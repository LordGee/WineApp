<?php require_once ("Includes/header.php"); ?>
<?php require_once ("Controllers/wine_controller.php"); ?>

<?php
//    echo '<pre>';
//    var_dump($_SESSION["basket"]);
//    echo '</pre>';
?>
    <form method="get" action="wine.php">
        <select name="wine_type">
            <option name="wine_type" value="all">All Wines</option>
            <?php foreach ($accessCat as $cat): ?>
                <option name="wine_type" value="<?= $cat->category_id ?>" <?= (isset($_GET['wine_type']) && $_GET['wine_type'] != "all" && $_GET['wine_type'] != "showWish" && $cat->category_id == $_GET['wine_type']) ? "selected" : "" ?>><?= $cat->wine_colour ?> <?= $cat->wine_type ?></option>
            <?php endforeach; ?>
            <?php if (isset($_SESSION["Customer"])): ?>
                <option name="wine_type" value="showWish" <?= (isset($_GET['wine_type']) && $_GET['wine_type'] == "showWish") ? "selected" : "" ?>>Wish-List</option>
            <?php endif; ?>
        </select>
        <input type="hidden" name="iCode" value="filter"/>
        <input type="submit" value="Filter"/>
    </form>
        <?php foreach ($accessWines as $thisWine): ?>
            <div class="wine_rows">
                <div class="wine_img_pos">
                    <img src="<?= $thisWine->asset_link ?>" alt="<?= $thisWine->wine_name ?>" />
                </div>
                <div class="details">
                    <h3 class="wine_name"><?= $thisWine->wine_name ?></h3>
                    <h4><?= $thisWine->country ?></h4>
                    <p><?= $thisWine->description ?></p>
                    <p>Bottle Size : <?= $thisWine->bottle_size ?>ml</p>
                    <p>Price Per Bottle = £<?= $thisWine->price_per_bottle ?></p>
                </div>
                <?php if (isset($_SESSION["Customer"])): ?>
                    <form method="post" action="wine.php">
                        <input type="hidden" name="wId" value="<?= $thisWine->wine_id ?>"/>
                        <?php $already = false; ?>
                        <?php foreach ($userWishList as $wl): ?>
                            <?php
                                if ($wl->wine_id_fk == $thisWine->wine_id) {
                                    $already = true;
                                }
                            ?>
                        <?php endforeach; ?>
                            <?php if ($already): ?>
                                <input type="hidden" name="iCode" value="removeWish"/>
                                <input type="submit" value="Remove from Wish List"/>
                            <?php else: ?>
                                <input type="hidden" name="iCode" value="wish"/>
                                <input type="submit" value="Add to Wish List"/>
                            <?php endif; ?>
                    </form>
                    <?php if (isset($_POST["wId"]) && $_POST["wId"] == $thisWine->wine_id): ?>
                        <span class="message"><?= $message ?></span>
                        <span class="error"><?= $error ?></span>
                    <?php endif; ?>
                <?php endif; ?>
                <form method="post" action="wine.php">
                    <input type="hidden" name="wId" value="<?= $thisWine->wine_id ?>"/>
                    <?php  $inBasket = false; ?>
                    <?php if (isset($_SESSION["basket"])): ?>
                        <?php foreach ($_SESSION["basket"] as $index => $basketItem): ?>
                            <?php
                                if ($basketItem == $thisWine->wine_id){
                                    $inBasket = true;
                                }
                            ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <?php if ($inBasket): ?>
                        <input type="hidden" name="iCode" value="removeBasket"/>
                        <input type="submit" value="Remove" />
                    <?php else: ?>
                        <label for="qty">Quantity</label>
                        <input type="number" name="qty" min="0" max="<?= $thisWine->quantity ?>" />
                        <input type="hidden" name="iCode" value="addBasket"/>
                        <?php if ($thisWine->quantity < 50 && $thisWine->quantity > 0): ?>
                            <input type="submit" value="BUY QUICKLY" />
                            <br>
                            <label>Hurry, only <?= $thisWine->quantity ?> left in stock</label>
                        <?php elseif ($thisWine->quantity == 0): ?>
                            <input type="submit" value="BUY"  disabled/>
                            <br>
                            <label>This wine is currently out of stock, please add this item to your wish-list to recieve updates for stock availability on this wine</label>
                        <?php else: ?>
                            <input type="submit" value="BUY" />
                        <?php endif; ?>
                    <?php endif; ?>
                </form>
            </div>
        <?php endforeach; ?>


        <img src="image/2glass.jpg" alt="Enjoy a little sparkle" title="Click here to explore more." />



<?php require_once ("Includes/footer.php"); ?>