<?php require_once ("Includes/header.php"); ?>

<?php require_once ("Includes/info.php"); ?>
<?php
//    echo '<pre>';
//    var_dump($_SESSION);
//    echo '</pre>';
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
      <title>Image Slider CSS3</title>
      <link rel="stylesheet" type="text/css" href="style/main.css">
<style>
body {
    image: url("image/wine_clash.png");
}
h1 {
    color: darkslategray;
    font-style: oblique;
    text-align: left;
    font-size: 40px;
}

h2 {
    color: darkblue;
    font-size: 20px;
}


h4 {
    color: crimson;
}

div.image {
    margin: 5px;
    border: 1px solid #ccc;
    float: left;
    width: 180px;
}

div.image:hover {
    border: 1px solid #777;
}

div.image img {
    width: 100%;
    height: auto;
}

div.desc {
    padding: 15px;
    text-align: center;
}

.boxed {
  border: 2px solid green; 
}

</style>
</head>
<h1>Welcome to Ten Green Bottles</h1>

  <h2> Enjoy our fine variety of luxury wines. We promise you won't be disappointed!!!</h2>
<body>
<div id="slider">
  <figure>
    <img src="image/slide1.jpg">
    <img src="image/slide2.jpg">
    <img src="image/slide-3-barrels.jpg">
    <img src="image/slide12.jpg">
    <img src="image/slide11.jpg">
  </figure>
</div>

<figure>
  <div class="boxed">
Welcome to Ten Green Bottles, the UK's largest Internet retailer of top quality non-alcoholic Wines & Champagnes. We cater for anniversaries, birthdays, corporate gifts and other special occasions. 

We deliver direct, next day, to residential or business addresses anywhere in the UK. All orders are beautifully packaged, register today to receive a 25% discount code on your first order. Call us today on 0845 600 1212 to discuss any special requirements.

We offer a price promise guarantee & tell you when your gift has been delivered! 
  </div>

</figure>

<h4>Special Offers Below:</h4>
<div class="image">
  <a target="_blank" href="wine_day_brands.png">
    <img src="image/wine_day_brands.png" alt="Manager Special" width="100" height="150">
  </a>
  <div class="desc">Managers Special</div>
</div>

<div class="image">
  <a target="_blank" href="classic-flyout.png">
    <img src="image/classic-flyout.png" alt="10% off" width="300" height="200">
  </a>
  <div class="desc">10% off your Order</div>
</div>

<div class="image">
  <a target="_blank" href="buy5.jpg">
    <img src="image/buy5.jpg" alt="buy5get1" width="300" height="200">
  </a>
  <div class="desc">Buy 5 Bottles & recieve one FREE!</div>
</div>

<div class="image">
  <a target="_blank" href="mixandmatch.png">
    <img src="image/mixandmatch.png" alt="25% off" width="300" height="200">
  </a>
  <div class="desc">Mix & Match</div>
</div>

<div class="image">
  <a target="_blank" href="wine_glasses.png">
    <img src="image/wine_glasses.png" alt="Grape Week" width="300" height="200">
  </a>
  <div class="desc">Grape of the Week</div>
</div>

<div class="image">
  <a target="_blank" href="25.jpg">
    <img src="image/25.jpg" alt="25% off" width="300" height="200">
  </a>
  <div class="desc">Register today! Receive 25% DiscountCode</div>
</div>

</body>
</html>

<?php require_once ("Includes/footer.php"); ?>
