<?php require_once ('Includes/header.php'); ?>
<?php require_once ('Controllers/aCampaign_controller.php'); ?>

<?php
//echo '<pre>';
//var_dump($_SESSION);
//echo '</pre>';
?>

    <span class="message"><?= $message ?></span>
    <span class="error"><?= $error ?></span>

    <div class="row">
        <div class="col-offset-lg-2 col-lg-8 col-offset-md-1 col-md-10 col-sm-12 formContent">
            <h1>Campaign Management</h1>
            <form method="get" action="aCampaign.php">
                <input type="hidden" name="aCode" value="addNew">
                <input type="submit" value="Add New Offer">
            </form>
        </div>
    </div>



    <?php if (isset($_GET['aCode']) && $_GET['aCode'] == "addNew"): ?>
    <div class="row">
        <div class="col-offset-lg-2 col-lg-8 col-offset-md-1 col-md-10 col-sm-12 formContent">
            <h2>Create New Campaign</h2>
            <form method="post" action="aCampaign.php" enctype="multipart/form-data">
                <div>
                    <label for="offer_name">Offer Name : </label>
                    <input type="text" name="offer_name" placeholder="Name of Offer">
                </div>
                <br>
                <div>
                    <label for="asset_link">Upload an image for your offer : </label>
                    <input type="file" name="asset_link" >
                </div>
                <br>
                <div>
                    <label for="alt_description">Describe the offer</label>
                    <textarea name="alt_description" placeholder="Describe the offer here" rows="5"></textarea>
                </div>
                <br>
                <div>
                    <input type="hidden" name="aCode" value="newOffer">
                    <input type="submit" value="Create Offer">
                </div>
            </form>
        </div>
    </div>
    <?php elseif (isset($_GET['aCode']) && $_GET['aCode'] == "manageOne" || isset($_POST['aCode']) && $_POST['aCode'] == "updateOffer"): ?>
    <div class="row">
        <div class="col-offset-lg-2 col-lg-8 col-offset-md-1 col-md-10 col-sm-12 formContent">
            <h2>Manage Campaign - <?= $selectedCampaign[0]->offer_name ?></h2>
            <div class="row">
                <?php foreach ($campaignItems as $item): ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 blockObjects wineDetail">
                        <h3>Wine Name : <?= $item->wine_name ?></h3>
                        <p>Country : <?= $item->country ?></p>
                        <p>Price : <?= $item->price_per_bottle ?></p>
                        <form method="post" action="aCampaign.php">
                            <div>
                                <label for="start_date">Start Date : </label>
                                <input type="date" id="start_date" name="start_date" value="<?= $item->start_date ?>">
                            </div>
                            <br>
                            <div>
                                <label for="finish_date">Finish Date : </label>
                                <input type="date" id="finish_date" name="finish_date" value="<?= $item->finish_date ?>">
                            </div>
                            <br>
                            <div>
                                <input type="hidden" name="aCode" value="updateOffer">
                                <input type="hidden" name="clId" value="<?= $item->campaign_line_id ?>">
                                <input type="hidden" name="id" value="<?= $selectedCampaign[0]->campaign_id ?>">
                                <input type="submit" name="updateFunction" value="Update">
                                <input type="submit" name="updateFunction" value="Remove">
                            </div>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-offset-lg-2 col-lg-8 col-offset-md-1 col-md-10 col-sm-12 formContent">
            <h2>Add more items to the <?= $selectedCampaign[0]->offer_name ?> campaign</h2>
            <div class="row">
                <?php foreach ($wines as $w): ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 blockObjects wineDetail">
                        <h5>Wine Name : <?= $w->wine_name ?></h5>
                        <p>Country : <?= $w->country ?></p>
                        <p>Price : <?= $w->price_per_bottle ?></p>
                        <form method="post" action="aCampaign.php">
                            <?php if (checkAlready($w->wine_id, 'wine_id_fk', $campaignItems)): ?>
                                <label>Item already added to this campaign</label>
                                <br><br>
                                <input type="hidden" name="aCode" value="addOffer">
                                <input type="hidden" name="cId" value="<?= $selectedCampaign[0]->campaign_id ?>">
                                <input type="hidden" name="wId" value="<?= $w->wine_id ?>">
                                <input type="submit" name="updateFunction" value="Remove">
                            <?php else: ?>
                            <div>
                                <label for="start_date">Start Date : </label>
                                <input type="date" id="start_date" name="start_date">
                            </div>
                                <br>
                            <div>
                                <label for="finish_date">Finish Date : </label>
                                <input type="date" id="finish_date" name="finish_date">
                            </div>
                                <br>
                            <div>
                                <input type="hidden" name="aCode" value="addOffer">
                                <input type="hidden" name="cId" value="<?= $selectedCampaign[0]->campaign_id ?>">
                                <input type="hidden" name="wId" value="<?= $w->wine_id ?>">
                                <input type="submit" name="updateFunction" value="Add">
                            </div>
                            <?php endif; ?>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-offset-lg-2 col-lg-8 col-offset-md-1 col-md-10 col-sm-12 formContent">
            <h2>All Campaigns</h2>
            <?php if ($accessCamp != null): ?>
            <p>Select a campaign to manage</p>
            <div class="tableData">
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
            </div>
        </div>
    </div>


<?php require_once ('Includes/footer.php'); ?>