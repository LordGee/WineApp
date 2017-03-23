<?php

    function createQP($_q, array $_p) {
        global $pdo;
        $statement = $pdo->prepare($_q);
        $result = $statement->execute($_p);
        return $result;
    }

    function createQPlId($_q, array $_p) {
        global $pdo;
        $statement = $pdo->prepare("$_q");
        $result = $statement->execute($_p);
        if ($result) {
            return $pdo->lastInsertId();
        } else {
            return false;
        }
    }

    function insertAddress($_p) {
        $q = "INSERT INTO address (door_number_name, post_code) VALUES (? , ?)";
        $p = [$_p['door_number_name'], $_p['post_code']];
        return createQPlId($q, $p);
    }

    function insertFullAddress($_p) {
        $q = "INSERT INTO address (door_number_name, street_name, city, county, post_code) VALUES (?, ?, ?, ?, ?)";
        $p = [$_p['door_number_name'], $_p['street_name'], $_p['city'], $_p['county'], $_p['post_code']];
        return createQPlId($q, $p);
    }

    function insertCustomer($_p, $_pw, $_aId) {
        $q = "INSERT INTO customer (first_name, last_name, phone_number, email_address, password, address_id_fk) VALUES (?, ?, ?, ?, ?, ?)";
        $p = [$_p['first_name'], $_p['last_name'], $_p['phone_number'], $_p['email_address'], $_pw, $_aId];
        return createQPlId($q, $p);
    }

    function addWineToWishList($_wId, $_cId) {
        $q = "INSERT INTO wish_list (watch, last_modified, customer_id_fk, wine_id_fk) VALUES (1, CURRENT_DATE(), ?, ? )";
        $p = [$_cId, $_wId];
        return createQP($q, $p);
    }

    function addPayment($_p) {
        $q = "INSERT INTO payment (card_type, card_name, card_number, expiry_date, customer_id_fk) VALUES (?, ?, ?, ?, ?)";
        $p = [$_p['new_card_type'], $_p['new_card_name'], $_p['new_card_number'], $_p['new_card_expiry'], $_SESSION["Customer"]];
        return createQP($q, $p);
    }

    function addNewOrder($_cId, $_total, $_pId, $_aId) {
        $q = "INSERT INTO customer_order (order_date, total_value, payment_id_fk, address_id_fk, customer_id_fk) VALUES (CURRENT_DATE(), ?, ?, ?, ?)";
        $p = [$_total, $_pId, $_aId, $_cId];
        return createQPlId($q, $p);
    }

    function addNewOrderLines($_oId, $_lVal, $_wId, $_qty) {
        $q = "INSERT INTO customer_order_line (line_value, quantity, wine_id_fk, customer_order_id_fk) VALUES (?, ?, ?, ?)";
        $p = [$_lVal, $_qty, $_wId, $_oId];
        return createQP($q, $p);
    }

    function insertWine($_wName, $_wCoun, $_wSize, $_wDesc, $_wPric, $_wLink, $_wCat){
        $q = "INSERT INTO wine (wine_name, country, bottle_size, description, price_per_bottle, asset_link, category_id_fk) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $p = [$_wName, $_wCoun, $_wSize, $_wDesc, $_wPric, $_wLink, $_wCat];
        return createQPlId($q, $p);
    }

    function addStockRelationship($_wId) {
        $q = "INSERT INTO stock_hold (wine_id_fk) VALUES (?)";
        $p = [$_wId];
        return createQP($q, $p);
    }

    function addNewCampaign($_name, $_link, $_desc) {
        $q = "INSERT INTO campaign (offer_name, asset_link, alt_description) VALUES (?, ?, ?)";
        $p = [ $_name, $_link, $_desc];
        return createQPlId($q, $p);
    }

    function addCampaignLine($_sd, $_fd, $_cId, $_wId) {
        $q = "INSERT INTO campaign_line (start_date, finish_date, campaign_id_fk, wine_id_fk) VALUES (?,?,?,?)";
        $p = [$_sd, $_fd, $_cId, $_wId];
        return createQP($q, $p);
    }
?>