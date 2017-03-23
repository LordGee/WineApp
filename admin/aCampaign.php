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
        <form method="post" action="aCampaign.php" enctype="multipart/form-data">
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
    <?php elseif (isset($_GET['aCode']) && $_GET['aCode'] == "manageOne"): ?>
        <h2>Manage Campaign - <?= $selectedCampaign[0]->offer_name ?></h2>

    <?php endif; ?>


    <h1>All Campaigns</h1>
    <?php if ($accessCamp != null): ?>
    <p>Select a campaign to manage</p>
        <table>
            <tr>
                <th>Offer Name</th>
                <th>Manage</th>
            </tr>
    <?php else: ?>
    <p>No Campaigns exist, create one now</p>
    <form method="get" action="aCampaign.php">
        <input type="hidden" name="aCode" value="addNew">
        <input type="submit" value="Add New Offer">
    </form>
    <?php endif; ?>

    <?php foreach ($accessCamp as $camp): ?>
        <tr>
            <td><?= $camp->offer_name ?></td>
            <td>
                <form method="get" action="aCampaign.php">
                    <input type="hidden" name="aCode" value="manageOne">
                    <input type="hidden" name="id" value="<?= $camp->campaign_id ?>">
                    <input type="submit" value="Manage">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
        </table>


<?php require_once ('Includes/footer.php'); ?>