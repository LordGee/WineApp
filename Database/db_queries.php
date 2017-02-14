<?php
    function getAllWines() {
        global $pdo;
        $statement = $pdo->prepare('SELECT * FROM wine, category WHERE wine.category_id_fk = category.category_id');
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

    function loginUser($_email, $_pass) {
        global $pdo;
        $statement = $pdo->prepare('SELECT customer_id FROM customer WHERE email_address = ? AND password = ? LIMIT 1');
        $statement->execute([$_email, $_pass]);
        $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Customer');
        return $result;
    }

    function getUserById($_id) {
        global $pdo;
        $statement = $pdo->prepare('SELECT first_name FROM customer WHERE customer_id = ? LIMIT 1');
        $statement->execute([$_id]);
        $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Customer');
        return $result;
    }
?>