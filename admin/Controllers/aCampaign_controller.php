<?php
require_once("Database/db_access.php");
require_once ("../Model/m_wine.php");
require_once ("../Model/m_campaign.php");
require_once ("Controllers/upload_controller.php");


if (!isset($error)) {
    $error = "";
}
if (!isset($message)) {
    $message = "";
}

    $accessCamp = [];
    $accessCamp = getAllCampaigns();

    // Add new campaign
    if (isset($_GET['aCode'])) {
        if ($_GET['aCode'] == "addNew") {

        }
    }
    if (isset($_POST['aCode'])) {
        if ($_POST['aCode'] == "newOffer") {
            if ($_FILES['asset_link'] != null) {
                $asset = uploadPicture();
            } else {
                $asset = null;
            }
            $result = addNewCampaign($_POST['offer_name'], $asset, $_POST['alt_description']);
        }
    }

    //  List current Campaigns & modify


?>