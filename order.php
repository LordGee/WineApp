<?php require_once ("Includes/header.php"); ?>
<?php require_once ("Controllers/order_controller.php"); ?>

<?php
//echo '<pre>';
//var_dump($_SESSION["total"]);
//echo '</pre>';
?>

<span class="error"><?= $error ?></span>
<span class="message"><?= $message ?></span>

<div id="old">
    <h3>Payment Details</h3>
    <form method="post" action="confirmation.php">
        <label for="card">Select Payment Method : </label>
        <select name="card">
            <?php foreach ($userPayment as $pay): ?>
                <?php $pCard = payConvert($pay->card_number); ?>
                <option name="card" value="<?= $pay->payment_id ?>"><?= $pCard ?></option>
            <?php endforeach; ?>
        </select>
        <br/>
        <h4>Total Value = £<?= $_SESSION["total"] ?></h4>
        <input type="hidden" name="iCode" value="complete"/>
        <input type="submit" value="Confirm Payment" />
    </form>
</div>
<div>
    <form method="post" action="order.php">
        <input type="hidden" name="iCode" value="add">
        <input type="submit" value="Add New Card">
    </form>
</div>
<?php if (isset($_POST["iCode"]) && $_POST["iCode"] == "add"): ?>
<div id="new">
    <h3>Add New Card</h3>
    <form method="post" action="order.php">
        <label for="new_card_type">Card Type</label>
        <select name="new_card_type">
            <option name="new_card_type" value="Visa">Visa</option>
            <option name="new_card_type" value="Mastercard">Mastercard</option>
            <option name="new_card_type" value="American Express">American Express</option>
        </select>
        <label for="new_card_name">Name displayed on card</label>
        <input type="text" name="new_card_name" placeholder="Enter name on card" required />
        <label for="new_card_number">Enter your card number</label>
        <input type="text" name="new_card_number" placeholder="Enter name on card" required minlength="16" maxlength="16"/>
        <label for="new_card_expiry">Select the expiry date</label>
        <input type="date" name="new_card_expiry" required />
        <input type="hidden" name="iCode" value="addCard" />
        <input type="submit" value="Add" />
    </form>
</div>

<?php endif; ?>

<?php require_once ("Includes/footer.php"); ?>