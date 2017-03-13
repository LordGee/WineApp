<div id="userInfo">
        <?php if(isset($_SESSION["Customer"])): ?>
    <p>Welcome, <?= $currentUser[0]->first_name ?></p>
    <a href="wine.php?wine_type=showWish&iCode=filter"><p>Wish-List ( <?= count($userWishList) ?> )</p></a>
<?php endif; ?>
<?php if(isset($_SESSION["basket"])): ?>
    <a href="cart.php"><p>Shopping Cart ( <?= count($_SESSION["basket"]) ?> )</p></a>
<?php endif; ?>
</div>
<header class="topArea">

</header>
<!-- TODO Add a search box here -->
<div id="contentArea">
