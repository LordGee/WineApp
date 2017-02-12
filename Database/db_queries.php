<?php
    function getAllWines() {
        global $pdo;
        $statement = $pdo->prepare('SELECT * FROM wine');
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Wine');
        return $result;
    }

    function loginUser($_email, $_pass) {
        global $pdo;
        $statement = $pdo->prepare('SELECT * FROM customer WHERE email_address = ? AND password = ?');
        $statement->bindParam(1, $_email);
        $statement->bindParam(2, $_pass);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Customer');
        return $result;
    }

?>