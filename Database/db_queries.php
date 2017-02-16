<?php
    function getAllWines() {
        global $pdo;
        $statement = $pdo->prepare('SELECT * FROM wine, category WHERE wine.category_id_fk = category.category_id ORDER BY wine_name ASC ');
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Wine');
        return $result;
    }

    function getAllCategories() {
        global $pdo;
        $statement = $pdo->prepare('SELECT * FROM category');
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Category');
        return $result;
    }

    function getAllWinesByCategory($_id) {
        global $pdo;
        $statement = $pdo->prepare('SELECT * FROM wine WHERE category_id_fk = ? ORDER BY wine_name ASC ');
        $statement->execute([$_id]);
        $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Category');
        return $result;
    }

    function getWineById($_id) {
        global $pdo;
        $statement = $pdo->prepare('SELECT * FROM wine WHERE wine_id = ? LIMIT 1');
        $statement->execute([$_id]);
        $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Wine');
        return $result;
    }

    function getAllWishListById($_id) {
        global $pdo;
        $statement = $pdo->prepare('SELECT * FROM wish_list WHERE customer_id_fk = ?');
        $statement->execute([$_id]);
        $result = $statement->fetchAll(PDO::FETCH_CLASS, 'WishList');
        return $result;
    }

    function getAllWinesFromWishList($_id) {
        global $pdo;
        $statement = $pdo->prepare('SELECT * FROM wine, wish_list WHERE wine.wine_id = wish_list.wine_id_fk HAVING wish_list.customer_id_fk = ?  ORDER BY wine_name ASC ');
        $statement->execute([$_id]);
        $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Wine');
        return $result;
    }

    function checkWineInWishList($_wId, $_cId) {
        global $pdo;
        $statement = $pdo->prepare('SELECT * FROM wish_list WHERE customer_id_fk = ? AND wine_id_fk = ?');
        $statement->execute([$_cId, $_wId]);
        if ($statement->rowCount() == 0) {
            return true;
        } else {
            return false;
        }
    }

    function loginUser($_email, $_pass) {
        global $pdo;
        $statement = $pdo->prepare('SELECT customer_id FROM customer WHERE email_address = ? AND password = ? LIMIT 1');
        $statement->execute([$_email, $_pass]);
        $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Customer');
        return $result;
    }

    function getUserById($_id) {
        global $pdo;
        $statement = $pdo->prepare('SELECT * FROM customer WHERE customer_id = ? LIMIT 1');
        $statement->execute([$_id]);
        $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Customer');
        return $result;
    }

    function getAddressById($_aId) {
        global $pdo;
        $statement = $pdo->prepare('SELECT * FROM address WHERE address_id = ? LIMIT 1');
        $statement->execute([$_aId]);
        $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Address');
        return $result;
    }

    function getPaymentsById($_id) {
        global $pdo;
        $statement = $pdo->prepare('SELECT * FROM payment WHERE customer_id_fk = ?');
        $statement->execute([$_id]);
        $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Payment');
        return $result;
    }
?>