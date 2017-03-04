<?php require_once ("Includes/header.php"); ?>
<?php require_once ("Controllers/cart_controller.php"); ?>
<?php require_once ("Includes/info.php"); ?>

<?php
//    echo '<pre>';
//    var_dump($_SESSION["total"]);
//    echo '</pre>';
?>

    <h1>Shopping Cart</h1>
    <div>
        <h3>Customer Details</h3>
        <p>Name : <?= $currentUser[0]->first_name ?> <?= $currentUser[0]->last_name ?></p>
        <p>Address : <?= $userAddress[0]->door_number_name ?> <?= $userAddress[0]->street_name ?></p>
        <p><?= $userAddress[0]->city ?></p>
        <p><?= $userAddress[0]->county ?></p>
        <p><?= $userAddress[0]->post_code ?></p>
    </div>
    <form method="post" action="address.php">
        <input type="hidden" name="iCode" value="addAddress" />
        <input type="hidden" name="current" value="<?= $userAddress[0]->address_id ?>" />
        <input type="submit" value="Change Delivery Address">
    </form>
    <br/>
    <h3>Order Details</h3>
    <table>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
            <th></th>
            <th></th>
        </tr>
    <?php if (isset($_SESSION["basket"])): ?>
        <?php foreach ($accessWines as $thisWine): ?>
            <?php foreach ($_SESSION["basket"] as $index => $basketItem): ?>
                <?php if ($basketItem == $thisWine->wine_id): ?>
                    <form action="cart.php" method="post">
                        <tr>
                            <td><?= $thisWine->wine_name ?></td>
                            <?php foreach ($_SESSION["basketQty"] as $key => $q): ?>
                                <?php if ($key == $thisWine->wine_id): ?>
                                    <td><input type="number" value="<?= $q ?>" name="quantity" min="1" max="100" step="1"/></td>
                                    <?php $qty = $q ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <td><?= $thisWine->price_per_bottle ?></td>
                            <td><?= $thisWine->price_per_bottle * $qty ?></td>
                            <input type="hidden" name="wId" value="<?= $thisWine->wine_id ?>">
                            <td><input type="submit" name="btn" value="Update" /></td>
                            <td><input type="submit" name="btn" value="Remove" /></td>
                        </tr>
                    </form>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
    <?php endif; ?>
        <tr>
            <td></td>
            <td></td>
            <td><strong>Total Value : </strong></td>
            <td><strong><?= $_SESSION["total"] ?></strong></td>
        </tr>
    </table>
    <br/>
    <form method="post" action="order.php">
        <input type="hidden" name="address" value="<?= $userAddress[0]->address_id ?>" />
        <input type="hidden" name="iCode" value="order">
        <input type="submit" value="Confirm Order">
    </form>

<?php require_once ("Includes/footer.php"); ?>
