<?php require_once ("Includes/header.php"); ?>
<?php require_once("Controllers/oAddress_controller.php"); ?>
<?php require_once ("Includes/info.php"); ?>

<?php
//echo '<pre>';
//var_dump($chooseAddress[0]);
//echo '</pre>';
?>
    <div class="row">
        <div class="col-offset-lg-2 col-lg-8 col-offset-md-1 col-md-10 col-sm-12 formContent">
            <h1>Manage Addresses</h1>
            <form method="post" action="address.php">
                <label for="selectAddress">Choose an address previously used or add a new address</label>
                <select name="selectAddress">

                    <?php foreach ($allUsed as $a): ?>
                        <option name="selectAddress" value="<?= $a->address_id ?>"><?= $a->door_number_name ?>, <?= $a->post_code ?></option>
                    <?php endforeach; ?>
                    <option name="selectAddress" value="new" >Add New Address</option>
                </select>
                <br/>
                <input type="hidden" name="iCode" value="choose">
                <input type="submit" value="select">
            </form>
        </div>
    </div>
<?php if (isset($_SESSION["address"]) && $_POST["iCode"] == "choose"): ?>
    <br/>
    <div class="row">
        <div class="col-offset-lg-2 col-lg-8 col-offset-md-1 col-md-10 col-sm-12 formContent">
            <h2>Confirm Address to Use</h2>
            <form method="post" action="address.php">
                <br>
                <label for="door_number_name">Door Number : </label>
                <input type="text" name="door_number_name" value="<?= ($chooseAddress[0] != null) ? $chooseAddress[0]->door_number_name : ''; ?>" placeholder="Enter door number" <?= ($chooseAddress[0] != null) ? 'readonly' : ''; ?>/>
                <br><br>
                <label for="street_name">Street Name : </label>
                <input type="text" name="street_name" value="<?= ($chooseAddress[0] != null) ? $chooseAddress[0]->street_name : ''; ?>" placeholder="Enter street name" <?= ($chooseAddress[0] != null) ? 'readonly' : ''; ?>/>
                <br><br>
                <label for="city">City : </label>
                <input type="text" name="city" value="<?= ($chooseAddress[0] != null) ? $chooseAddress[0]->city : ''; ?>" placeholder="Enter the city" <?= ($chooseAddress[0] != null) ? 'readonly' : ''; ?>/>
                <br><br>
                <label for="county">County : </label>
                <input type="text" name="county" value="<?= ($chooseAddress[0] != null) ? $chooseAddress[0]->county : ''; ?>" placeholder="Enter the county" <?= ($chooseAddress[0] != null) ? 'readonly' : ''; ?>/>
                <br><br>
                <label for="post_code">Post Code : </label>
                <input type="text" name="post_code" value="<?= ($chooseAddress[0] != null) ? $chooseAddress[0]->post_code : ''; ?>" placeholder="Enter door number" maxlength="8" <?= ($chooseAddress[0] != null) ? 'readonly' : ''; ?>/>
                <br><br>
                <input type="hidden" name="id" value="<?= ($chooseAddress[0] != null) ? $chooseAddress[0]->address_id : 'new'; ?>">
                <input type="hidden" name="iCode" value="use">
                <input type="submit" value="Use This Address">
            </form>
        </div>
    </div>
<?php endif; ?>

<?php require_once ("Includes/footer.php"); ?>