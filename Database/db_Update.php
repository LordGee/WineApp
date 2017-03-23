<?php

    function updateQP($_q, array $_p) {
        global $pdo;
        $statement = $pdo->prepare($_q);
        $result = $statement->execute($_p);
        return $result;
    }

    function updateStockAfterSale($_wId, $_qty) {
        $q = "UPDATE stock_hold SET quantity = quantity - ? WHERE wine_id_fk = ?";
        $p = [$_qty, $_wId];
        return updateQP($q, $p);
    }

    function updateWine($_wId, $_wName, $_wCoun, $_wSize, $_wDesc, $_wPric, $_wLink, $_wCat) {
        $q = "UPDATE wine SET wine_name = ?, country = ?, bottle_size = ?, description = ?, price_per_bottle = ?, asset_link = ?, category_id_fk = ? WHERE wine_id = ?";
        $p = [$_wName, $_wCoun, $_wSize, $_wDesc, $_wPric, $_wLink, $_wCat, $_wId];
        return updateQP($q, $p);
    }

    function addNewStock($_wId, $_qty) {
        $q = "UPDATE stock_hold SET quantity = quantity + ? WHERE wine_id_fk = ?";
        $p = [$_qty, $_wId];
        return updateQP($q, $p);
    }

    function addAuthorisation($_cId, $_auth) {
        $q = "UPDATE customer SET reset_code = ?, reset_time = NOW() WHERE customer_id = ?";
        $p = [$_auth, $_cId];
        return updateQP($q, $p);
    }

    function removeAuthorisation($_cId) {
        $q = "UPDATE customer SET reset_code = null, reset_time = null WHERE customer_id = ?";
        $p = [$_cId];
        return updateQP($q, $p);
    }

    function updatePassword($_p, $_auth, $_cId) {
        $q = "UPDATE customer SET password = ? WHERE reset_code = ? AND customer_id = ?";
        $p = [$_p, $_auth, $_cId];
        return updateQP($q, $p);
    }

    function setUserAsAdmin($_m, $_cId) {
        $q = "UPDATE customer SET access = ? WHERE customer_id = ?";
        $p = [$_m, $_cId];
        return updateQP($q, $p);
    }

    function updateCampaignLine($_clId, $_sd, $_fd) {
        $q = "UPDATE campaign_line SET start_date = ?, finish_date = ? WHERE campaign_line_id = ?";
        $p = [$_sd, $_fd, $_clId];
        return updateQP($q, $p);
    }
?>