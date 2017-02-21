<?php
    function updateStockAfterSale($_wId, $_qty) {
        global $pdo;
        $statement = $pdo->prepare("UPDATE stock_hold SET quantity = quantity - ? WHERE wine_id_fk = ?");
        $result = $statement->execute([$_qty, $_wId]);
        return $result;
    }

    function updateWine($_wId, $_wName, $_wCoun, $_wSize, $_wDesc, $_wPric, $_wLink, $_wCat) {
        global $pdo;
        $statement = $pdo->prepare("UPDATE wine SET wine_name = :name, country = :coun, bottle_size = :size, description = :desc, price_per_bottle = :pric, asset_link = :link, category_id_fk = :cat WHERE wine_id = :id");
        $statement->bindParam(':name', $_wName);
        $statement->bindParam(':coun', $_wCoun);
        $statement->bindParam(':size', $_wSize);
        $statement->bindParam(':desc', $_wDesc);
        $statement->bindParam(':pric', $_wPric);
        $statement->bindParam(':link', $_wLink);
        $statement->bindParam(':cat', $_wCat);
        $statement->bindParam(':id', $_wId);
        $result = $statement->execute();
                return $result;
    }

function addNewStock($_wId, $_qty) {
    global $pdo;
    $statement = $pdo->prepare("UPDATE stock_hold SET quantity = quantity + ? WHERE wine_id_fk = ?");
    $result = $statement->execute([$_qty, $_wId]);
    return $result;
}
?>