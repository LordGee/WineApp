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
?>