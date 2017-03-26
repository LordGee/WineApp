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
    $accessCamp = $readObject->getAllCampaigns();

    // Add new campaign
    if (isset($_GET['aCode'])) {
        if ($_GET['aCode'] == "addNew") {
            /* Just in case */
        } elseif ($_GET['aCode'] == "manageOne") {
            $campaignItems = [];
            $campaignItems = $readObject->getAllCampaignItemsById($_GET['id']);
            $selectedCampaign = [];
            $selectedCampaign = $readObject->getCampaignById($_GET['id']);
            $wines = [];
            $wines = $readObject->getAllWines();
        }
    }
    if (isset($_POST['aCode'])) {
        if ($_POST['aCode'] == "newOffer") {
            if ($_FILES['asset_link'] != null) {
                $asset = uploadPicture();
            } else {
                $asset = null;
            }
            $result = $createObject->addNewCampaign($_POST['offer_name'], $asset, $_POST['alt_description']);
        } elseif ($_POST['aCode'] == "updateOffer") {
            if ($_POST['updateFunction'] == "Update") {
                $result = $updateObject->updateCampaignLine($_POST['clId'], $_POST['start_date'], $_POST['finish_date']);
            } elseif ($_POST['updateFunction'] == "Remove") {
                $result = $deleteObject->removeCampaignLine($_POST['clId']);
            }
            header("Location: aCampaign.php?aCode=manageOne&id={$_POST['id']}");
        } elseif ($_POST['aCode'] == "addOffer") {
            if ($_POST['updateFunction'] == "Add") {
                $result = $createObject->addCampaignLine($_POST['start_date'], $_POST['finish_date'], $_POST['cId'], $_POST['wId']);
            } elseif ($_POST['updateFunction'] == "Remove") {
                $result = $deleteObject->removeCampaignLineByIds($_POST['cId'], $_POST['wId']);
            }
            header("Location: aCampaign.php?aCode=manageOne&id={$_POST['cId']}");
        }
    }

    function checkAlready($_v, $_f, array $_a) {
        foreach ($_a as $a) {
            if (isset($a->$_f) && $a->$_f === $_v) {
                return true;
            }
        }
        return false;
    }
?>