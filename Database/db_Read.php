<?php

    function runQC($_q, $_c)
    {
        global $pdo;
        $statement = $pdo->prepare($_q);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_CLASS, $_c);
        return $result;
    }

    function runQCP($_q, $_c, array $_p) {
        global $pdo;
        $statement = $pdo->prepare($_q);
        $statement->execute($_p);
        $result = $statement->fetchAll(PDO::FETCH_CLASS, $_c);
        return $result;
    }

    // wine
    function getAllWines() {
        $q = "SELECT * FROM wine, category, stock_hold WHERE stock_hold.wine_id_fk = wine.wine_id AND  wine.category_id_fk = category.category_id ORDER BY wine_name ASC";
        $c = 'Wine';
        return runQC($q, $c);
    }

    function getAllWinesByCategory($_id) {
        $q = "SELECT * FROM wine, category, stock_hold WHERE stock_hold.wine_id_fk = wine.wine_id AND wine.category_id_fk = category.category_id HAVING wine.category_id_fk = ? ORDER BY wine_name ASC";
        $c = 'Wine';
        $p = [$_id];
        return runQCP($q, $c, $p);
    }

    function getWineById($_id) {
        $q = "SELECT * FROM wine, category, stock_hold WHERE stock_hold.wine_id_fk = wine.wine_id AND wine.category_id_fk = category.category_id HAVING wine_id = ? LIMIT 1";
        $c = 'Wine';
        $p = [$_id];
        return runQCP($q, $c, $p);
    }

    function getAllWinesFromWishList($_id) {
        $q = "SELECT * FROM wine, wish_list, stock_hold WHERE stock_hold.wine_id_fk = wine.wine_id AND  wine.wine_id = wish_list.wine_id_fk HAVING wish_list.customer_id_fk = ?  ORDER BY wine_name ASC";
        $c = 'Wine';
        $p = [$_id];
        return runQCP($q, $c, $p);
    }

    function getAllWinesLikeName($_value) {
        $_value = "%$_value%";
        $q = "SELECT * FROM wine, category WHERE wine.wine_name LIKE ? OR wine.description LIKE ? OR category.wine_type LIKE ? OR category.wine_colour LIKE ? HAVING wine.category_id_fk = category.category_id ORDER BY wine_name ASC";
        $c = 'Wine';
        $p = [$_value, $_value, $_value, $_value];
        return runQCP($q, $c, $p);
    }

    // Category
    function getAllCategories() {
        $q = "SELECT * FROM category";
        $c = 'Category';
        return runQC($q, $c);
    }

    // WishList
    function getAllWishListById($_id) {
        $q = "SELECT * FROM wish_list WHERE customer_id_fk = ?";
        $c = 'WishList';
        $p = [$_id];
        return runQCP($q, $c, $p);
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

    // Customer
    function loginUser($_email, $_pass) {
        $q = "SELECT customer_id, access FROM customer WHERE email_address = ? AND password = ? LIMIT 1";
        $c = 'Customer';
        $p = [$_email, $_pass];
        return runQCP($q, $c, $p);
    }

    function getUserById($_id) {
        $q = "SELECT * FROM customer WHERE customer_id = ? LIMIT 1";
        $c = 'Customer';
        $p = [$_id];
        return runQCP($q, $c, $p);
    }

    function getAllUsers() {
        $q = "SELECT * FROM customer ORDER BY last_name ASC";
        $c = 'Customer';
        return runQC($q, $c);
    }

    function searchCustomerByName($_name) {
        $q = "SELECT * FROM customer WHERE first_name LIKE ? OR last_name LIKE ? ORDER BY last_name ASC";
        $c = 'Customer';
        $p = [$_name, $_name];
        return runQCP($q, $c, $p);
    }

    function getUserByAuthCode($_code) {
        $q = "SELECT * FROM customer WHERE reset_code = ? AND reset_time >= DATE_SUB(NOW(), INTERVAL 1 DAY) LIMIT 1";
        $c = 'Customer';
        $p = [$_code];
        return runQCP($q, $c, $p);
    }

    function getUserByEmail($_email) {
        $q = "SELECT * FROM customer WHERE email_address = ? LIMIT 1";
        $c = 'Customer';
        $p = [$_email];
        return runQCP($q, $c, $p);
    }

    // Address
    function getAddressById($_aId) {
        $q = "SELECT * FROM address WHERE address_id = ? LIMIT 1";
        $c = 'Address';
        $p = [$_aId];
        return runQCP($q, $c, $p);
    }

    function checkAddress($_n, $_pc)
    {
        $q = "SELECT * FROM address WHERE door_number_name = ? AND post_code = ? LIMIT 1";
        $c = 'Address';
        $p = [$_n, $_pc];
        return runQCP($q, $c, $p);
    }

    function getAllUsedAddressesByCustomerId($_cId) {
        $q = "SELECT * FROM customer_order, address WHERE customer_order.address_id_fk = address.address_id AND customer_order.customer_id_fk = ? GROUP BY address.address_id ORDER BY address.post_code ASC";
        $c = 'Address';
        $p = [$_cId];
        return runQCP($q, $c, $p);
    }

    // Payments
    function getPaymentsById($_id) {
        $q = "SELECT * FROM payment WHERE customer_id_fk = ?";
        $c = 'Payment';
        $p = [$_id];
        return runQCP($q, $c, $p);
    }

    // Orders
    function getAllOrdersByCustomerId($_cId) {
        $q = "SELECT * FROM customer_order WHERE customer_id_fk = ?";
        $c = 'customer_order';
        $p = [$_cId];
        return runQCP($q, $c, $p);
    }

    function getOrderLinesByOrderId($_oId) {
        $q = "SELECT * FROM customer_order_line, customer_order, wine WHERE customer_order_line.customer_order_id_fk = customer_order.customer_order_id AND customer_order_line.wine_id_fk = wine.wine_id HAVING customer_order_line.customer_order_id_fk = ?";
        $c = 'customer_order_line';
        $p = [$_oId];
        return runQCP($q, $c, $p);
    }





?>