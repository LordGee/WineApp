<?php require_once ('Includes/header.php'); ?>
<?php require_once ('Controllers/aCampaign_controller.php'); ?>

<?php
//echo '<pre>';
//var_dump($_SESSION);
//echo '</pre>';
?>

    <span class="message"><?= $message ?></span>
    <span class="error"><?= $error ?></span>

    <form method="get" action="aCampaign.php">
        <input type="hidden" name="aCode" value="addNew">
        <input type="submit" value="Add New Offer">
    </form>

    <?php if (isset($_GET['aCode']) && $_GET['aCode'] == "addNew"): ?>
        <h2>Create New Campaign</h2>
        <form method="post" action="aCampaign.php">
            <div>
                <label for="offer_name">Offer Name : </label>
                <input type="text" name="offer_name" placeholder="Name of Offer">
            </div>
            <div>
                <label for="asset_link">Upload an image for your offer : </label>
                <input type="file" name="asset_link" >
            </div>
            <div>
                <label for="alt_description">Describe the offer</label>
                <textarea name="alt_description" placeholder="Describe the offer here"></textarea>
            </div>
            <div>
                <input type="hidden" name="aCode" value="newOffer">
                <input type="submit" value="Create Offer">
            </div>
        </form>
    <?php endif; ?>

    <h1>Current Campaigns</h1>
    <p>Select a campaign to manage</p>
    <?php foreach ($accessCamp as $camp): ?>
        
    <?php endforeach; ?>


<?php require_once ('Includes/footer.php'); ?>