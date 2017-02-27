<?php
    function getAllWines() {
        global $pdo;
        $statement = $pdo->prepare('SELECT * FROM wine, category, stock_hold WHERE stock_hold.wine_id_fk = wine.wine_id AND  wine.category_id_fk = category.category_id ORDER BY wine_name ASC ');
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
        $statement = $pdo->prepare('SELECT * FROM wine, category, stock_hold WHERE stock_hold.wine_id_fk = wine.wine_id AND wine.category_id_fk = category.category_id HAVING wine.category_id_fk = ? ORDER BY wine_name ASC ');
        $statement->execute([$_id]);
        $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Wine');
        return $result;
    }

    function getWineById($_id) {
        global $pdo;
        $statement = $pdo->prepare('SELECT * FROM wine, category WHERE wine.category_id_fk = category.category_id AND wine_id = ? LIMIT 1');
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
        $statement = $pdo->prepare('SELECT * FROM wine, wish_list, stock_hold WHERE stock_hold.wine_id_fk = wine.wine_id AND  wine.wine_id = wish_list.wine_id_fk HAVING wish_list.customer_id_fk = ?  ORDER BY wine_name ASC ');
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
        $statement = $pdo->prepare('SELECT customer_id, access FROM customer WHERE email_address = ? AND password = ? LIMIT 1');
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

    function checkAddress($_n, $_pc)
    {
        global $pdo;
        $statement = $pdo->prepare('SELECT * FROM address WHERE door_number_name = ? AND post_code = ? LIMIT 1');
        $statement->execute([$_n, $_pc]);
        $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Address');
        return $result;
    }

    function getAllUsedAddressesByCustomerId($_cId) {
        global $pdo;
        $statement = $pdo->prepare('SELECT * FROM customer_order, address WHERE customer_order.address_id_fk = address.address_id AND customer_order.customer_id_fk = ? GROUP BY address.address_id ORDER BY address.post_code ASC');
        $statement->execute([$_cId]);
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

    function getAllUsers() {
        global $pdo;
        $statement = $pdo->prepare('SELECT * FROM customer ORDER BY last_name ASC');
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Customer');
        return $result;
    }

    function searchCustomerByName($_name) {
        global $pdo;
        $statement = $pdo->prepare('SELECT * FROM customer WHERE first_name LIKE ? OR last_name LIKE ? ORDER BY last_name ASC');
        $statement->execute([$_name, $_name]);
        $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Customer');
        return $result;
    }

    function getUserByAuthCode($_code) {
        global $pdo;
        $statement = $pdo->prepare('SELECT * FROM customer WHERE reset_code = ? AND reset_time >= DATE_SUB(NOW(), INTERVAL 1 DAY) LIMIT 1');
        $statement->execute([$_code]);
        $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Customer');
        return $result;
    }

    function getUserByEmail($_email) {
        global $pdo;
        $statement = $pdo->prepare('SELECT * FROM customer WHERE email_address = ? LIMIT 1');
        $statement->execute([$_email]);
        $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Customer');
        return $result;
    }

    function getAllOrdersByCustomerId($_cId) {
        global $pdo;
        $statement = $pdo->prepare('SELECT * FROM customer_order WHERE customer_id_fk = ?');
        $statement->execute([$_cId]);
        $result = $statement->fetchAll(PDO::FETCH_CLASS, 'customer_order');
        return $result;
    }

    function getOrderLinesByOrderId($_oId) {
        global $pdo;
        $statement = $pdo->prepare('SELECT * FROM customer_order_line, customer_order, wine WHERE customer_order_line.customer_order_id_fk = customer_order.customer_order_id AND customer_order_line.wine_id_fk = wine.wine_id HAVING customer_order_line.customer_order_id_fk = ?');
        $statement->execute([$_oId]);
        $result = $statement->fetchAll(PDO::FETCH_CLASS, 'customer_order_line');
        return $result;
    }

function getAllWinesByName($_wine) {
    global $pdo;
    $statement = $pdo->prepare('SELECT * FROM wine WHERE wine_name LIKE ? ORDER BY wine_name ASC');
    $statement->execute([$_wine]);
    $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Wine');
    return $result;
}

    function getWineByNameJson($_wine) {
        $wine = getAllWinesByName($_wine);
        return json_encode($wine);
    }
?>