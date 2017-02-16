<?php require_once ("Includes/header.php"); ?>
<?php require_once ("Controllers/cart_controller.php"); ?>

<?php
echo '<pre>';
var_dump($_SESSION["total"]);
echo '</pre>';
?>

<?php if (!isset($_SESSION['payment'])) ?>
<div id="old">
    <h3>Payment Details</h3>
    <form method="post" action="wine.php">

        <select name="card">
            <?php foreach ($userPayment as $pay): ?>
                <?php $pCard = payConvert($pay->card_number); ?>
                <option name="card" value="<?= $pay->payment_id ?>"><?= $pCard ?></option>
            <?php endforeach; ?>
            <option name="card" value="add" onclick="togglePay">Add New Card</option>
        </select>
        <br/>
        <input type="submit" name="btn" value="Use This Card" />
</div>
<div id="new" class="payHide">
    <h3>Add New Card</h3>
    <label for="new_card_type">Card Type</label>
    <select name="new_card_type">
        <option name="new_card_type" value="Visa">Visa</option>
        <option name="new_card_type" value="Mastercard">Mastercard</option>
        <option name="new_card_type" value="American Express">American Express</option>
    </select>
    <label for="new_card_name">Name displayed on card</label>
    <input type="text" name="new_card_name" placeholder="Enter name on card" />
    <label for="new_card_number">Enter your card number</label>
    <input type="text" name="new_card_number" placeholder="Enter name on card" minlength="16" maxlength="16"/>
    <label for="new_card_expiry">Select the expiry date</label>
    <input type="date" name="new_card_expiry" />
    <input type="submit" name="btn" value="Add" />
</div>
</form>


<script type="text/javascript">
    function togglePay() {
        var $paymentArea = $("#old, #new");
        $paymentArea.toggleClass("payHide");
    }
</script>

<?php require_once ("Includes/footer.php"); ?>