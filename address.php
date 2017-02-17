<?php require_once ("Includes/header.php"); ?>
<?php require_once ("Controller/customer_controller"); ?>

<h1>Manage Addresses</h1>
<form method="post" action="address.php">
    <select name="selectAdress">
        <?php  ?>
        <option name="selectAddress" value="new" >Add New Address</option>
    </select>
</form>


<?php require_once ("Includes/footer.php"); ?>