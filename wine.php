<?php require_once ("Includes/header.php"); ?>
<?php require_once ("Controllers/wine_controller.php"); ?>
<?php require_once ("Includes/info.php"); ?>
<?php
//    echo '<pre>';
//    var_dump($_SESSION["basket"]);
//    echo '</pre>';
?>
    <input type="text" name="wineSearch" id="wineSearch"><button onclick="search();">Search</button>
    <div class="searchResults"></div>
    <form method="get" action="wine.php">
        <label for="wine_type">Wine Type : </label>
        <select name="wine_type" id="wine_type">
            <option name="wine_type" value="all">All Wines</option>
            <?php foreach ($accessCat as $cat): ?>
                <option name="wine_type" value="<?= $cat->category_id ?>" <?= (isset($_GET['wine_type']) &&
                    $_GET['wine_type'] != "all" && $_GET['wine_type'] != "showWish" &&
                    $cat->category_id == $_GET['wine_type']) ? "selected" : "" ?>><?= $cat->wine_colour ?>
                    <?= $cat->wine_type ?></option>
            <?php endforeach; ?>
            <?php if (isset($_SESSION["Customer"])): ?>
                <option name="wine_type" value="showWish" <?= (isset($_GET['wine_type']) &&
                    $_GET['wine_type'] == "showWish") ? "selected" : "" ?>>Wish-List</option>
            <?php endif; ?>
        </select>
        <input type="hidden" name="iCode" value="filter"/>
        <input type="submit" value="Filter"/>
    </form>
    <form method="get" action="wine.php">
        <label for="lvl">Wine Taste : </label>
        <select name="lvl" id="lvl">
            <option name="lvl" value="all" <?= (isset($_GET['lvl']) && $_GET['lvl'] == 'all') ? "selected" : "" ?> >All Wines</option>
            <option name="lvl" value="Dry Wine" <?= (isset($_GET['lvl']) && $_GET['lvl'] == 'Dry Wine') ? "selected" : "" ?> >Dry Wines</option>
            <option name="lvl" value="Sweet Wine" <?= (isset($_GET['lvl']) && $_GET['lvl'] == 'Sweet Wine') ? "selected" : "" ?> >Sweet Wines</option>
            <option name="lvl" value="Light Bodied Wine" <?= (isset($_GET['lvl']) && $_GET['lvl'] == 'Light Bodied Wine') ? "selected" : "" ?> >Light Bodied Wines</option>
            <option name="lvl" value="Full Bodied Wine" <?= (isset($_GET['lvl']) && $_GET['lvl'] == 'Full Bodied Wine') ? "selected" : "" ?> >Full Bodied Wines</option>
        </select>
        <input type="hidden" name="iCode" value="filterLvl"/>
        <input type="submit" value="Filter"/>
    </form>
    <div class="row">
        <?php foreach ($accessWines as $thisWine): ?>
            <div class="col-offset-sm-1 col-sm-10 col-offset-md-1 col-md-5 col-offset-lg-1 col-lg-3 boxShadows margin">
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
                        <input type="number" name="qty" min="0" max="<?= $thisWine->quantity ?>" step="1" />
                        <input type="hidden" name="iCode" value="addBasket"/>
                        <?php if ($thisWine->quantity < 50 && $thisWine->quantity > 0): ?>
                            <input type="submit" value="BUY QUICKLY" />
                            <br>
                            <label>Hurry, only <?= $thisWine->quantity ?> left in stock</label>
                        <?php elseif ($thisWine->quantity == 0): ?>
                            <input type="submit" value="BUY"  disabled/>
                            <br>
                            <label>This wine is currently out of stock, please add this item to your wish-list to
                                receive updates for stock availability on this wine</label>
                        <?php else: ?>
                            <input type="submit" value="BUY" />
                        <?php endif; ?>
                    <?php endif; ?>
                </form>
            </div>
        <?php endforeach; ?>
    </div>

<?php require_once ("Includes/footer.php"); ?>
