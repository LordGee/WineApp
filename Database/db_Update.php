<?php
    function updateStock($_wId, $_qty) {
        global $pdo;
        $statement = $pdo->prepare("UPDATE stock_hold SET quantity = quantity - ? WHERE wine_id_fk = ?");
        $result = $statement->execute([$_qty, $_wId]);
        return $result;
    }
?>