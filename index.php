<?php require_once ("Includes/header.php"); ?>
<?php require_once ("Controllers/home_controller.php"); ?>
<?php require_once ("Includes/info.php"); ?>
<?php
//    echo '<pre>';
//    var_dump($_SESSION);
//    echo '</pre>';
?>
    <div class="row">
        <div class="col-offset-lg-2 col-lg-8 col-offset-md-1 col-md-10 col-sm-12">
            <h1>Welcome to Ten Green Bottles</h1>
            <p> Welcome to Ten Green Bottles, the UK's largest Internet retailer of top
       quality non-alcoholic Wines and Champagnes. We cater for anniversaries,
       birthdays, corporate gifts and other special occasions.</p> 
        </div>
    </div>
    <div class="row">
        <div class="col-offset-lg-2 col-lg-8 col-offset-md-1 col-md-10 col-sm-12">
            <h2>Great Offers from Ten Green Bottles</h2>
            <div class="row">
                <?php foreach ($accessCampaigns as $offer): ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="offer">
                        <a href="wine.php?iCode=offer&offerNo=<?= $offer->campaign_id ?>">
                            <h4><?= $offer->offer_name ?></h4>
                            <img src="<?= $offer->asset_link ?>" alt="<?= $offer->alt_description ?>">
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-offset-lg-2 col-lg-8 col-offset-md-1 col-md-10 col-sm-12">
            <p>We deliver direct, next day, to residential or business addresses
               anywhere in the UK. All orders are beautifully packaged, register today
               to receive a 25% discount code on your first order. Call us today on
               0845 600 1212 to discuss any special requirements.</p>
            <p>We offer a price promise guarantee and tell you when your gift has been
              delivered!</p> 
        </div>
    </div>
    <div class="row">
        <h2> Enjoy our fine variety of luxury wines. We promise you won't be disappointed!!!</h2>
        <div id="slider">
          <figure>
            <img src="image/slide1.jpg" alt= "wine poured in glass">
            <img src="image/slide2.jpg" alt= >
            <img src="image/slide-3-barrels.jpg">
            <img src="image/slide12.jpg">
            <img src="image/slide11.jpg">
          </figure>
        </div>
    </div>
    <div class="row">
        <h3>Special Offers Below:</h3>
        <div class="col-lg-2 col-md-3 col-sm-4">
            <div class="image">
                <a target="_blank" href="wine_day_brands.png">
                    <img src="image/wine_day_brands.png" alt="Manager Special" width="100" height="150">
                </a>
                <div class="desc">Managers Special</div>
            </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-4">
            <div class="image">
                <a target="_blank" href="classic-flyout.png">
                    <img src="image/classic-flyout.png" alt="10% off" width="300" height="200">
                </a>
                <div class="desc">10% off your Order</div>
            </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-4">
            <div class="image">
                <a target="_blank" href="buy5.jpg">
                    <img src="image/buy5.jpg" alt="buy5get1" width="300" height="200">
                </a>
                <div class="desc">Buy 5 Bottles & recieve one FREE!</div>
            </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-4">
            <div class="image">
                <a target="_blank" href="mixandmatch.png">
                    <img src="image/mixandmatch.png" alt="25% off" width="300" height="200">
                </a>
                <div class="desc">Mix & Match</div>
            </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-4">
            <div class="image">
                <a target="_blank" href="wine_glasses.png">
                    <img src="image/wine_glasses.png" alt="Grape Week" width="300" height="200">
                </a>
                <div class="desc">Grape of the Week</div>
            </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-4">
            <div class="image">
                <a target="_blank" href="25.jpg">
                    <img src="image/25.jpg" alt="25% off" width="300" height="200">
                </a>
                <div class="desc">Register today! Receive 25% DiscountCode</div>
            </div>
        </div>
    </div>


<!--</body> Saira WHY-->
<!--</html> There is still more in this html document -->

<?php require_once ("Includes/footer.php"); ?>
