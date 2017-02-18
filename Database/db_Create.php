<?php
    function insertAddress($_p) {
        global $pdo;
        $statement = $pdo->prepare("INSERT INTO address (door_number_name, post_code) VALUES (? , ?)");
        $statement->bindParam(1, $_p['door_number_name']);
        $statement->bindParam(2, $_p['post_code']);
        $result = $statement->execute();
        if ($result) {
            return $pdo->lastInsertId();
        } else {
            return false;
        }

    }

    function insertFullAddress($_p) {
        global $pdo;
        $statement = $pdo->prepare("INSERT INTO address (door_number_name, street_name, city, county, post_code) VALUES (?, ?, ?, ?, ?)");
        $result = $statement->execute([$_p['door_number_name'], $_p['street_name'], $_p['city'], $_p['county'], $_p['post_code']]);
        if ($result) {
            return $pdo->lastInsertId();
        } else {
            return false;
        }
    }

    function insertCustomer($_p, $_pw, $_aId) {
        global $pdo;
        $statement = $pdo->prepare("INSERT INTO customer (first_name, last_name, phone_number, email_address, password, address_id_fk) VALUES (?, ?, ?, ?, ?, ?)");
        $statement->bindParam(1, $_p['first_name']);
        $statement->bindParam(2, $_p['last_name']);
        $statement->bindParam(3, $_p['phone_number']);
        $statement->bindParam(4, $_p['email_address']);
        $statement->bindParam(5, $_pw);
        $statement->bindParam(6, $_aId);
        $result = $statement->execute();
        if ($result) {
            return $pdo->lastInsertId();
        } else {
            return false;
        }
    }

    function addWineToWishList($_wId, $_cId) {
        global $pdo;
        $statement = $pdo->prepare("INSERT INTO wish_list (watch, last_modified, customer_id_fk, wine_id_fk) VALUES (1, CURRENT_DATE(), ?, ? )");
        $result = $statement->execute([$_cId, $_wId]);
        return $result;
    }

    function addPayment($_p) {
        global $pdo;
        $statement = $pdo->prepare("INSERT INTO payment (card_type, card_name, card_number, expiry_date, customer_id_fk) VALUES (?, ?, ?, ?, ?)");
        $result = $statement->execute([$_p['new_card_type'], $_p['new_card_name'], $_p['new_card_number'], $_p['new_card_expiry'], $_SESSION["Customer"]]);
        return $result;
    }

    function addNewOrder($_cId, $_total, $_pId, $_aId) {
        global $pdo;
        $statement = $pdo->prepare("INSERT INTO customer_order (order_date, total_value, payment_id_fk, address_id_fk, customer_id_fk) VALUES (CURRENT_DATE(), ?, ?, ?, ?)");
        $result = $statement->execute([$_total, $_pId, $_aId, $_cId]);
        if ($result) {
            return $pdo->lastInsertId();
        } else {
            return false;
        }
    }

    function addNewOrderLines($_oId, $_lVal, $_wId, $_qty) {
        global $pdo;
        $statement = $pdo->prepare("INSERT INTO customer_order_line (line_value, quantity, wine_id_fk, customer_order_id_fk) VALUES (?, ?, ?, ?)");
        $result = $statement->execute([$_lVal, $_qty, $_wId, $_oId]);
        return $result;
    }
?>