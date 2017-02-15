<?php
    function removeWineFromWishList($_wId, $_cId) {
        global $pdo;
        $statement = $pdo->prepare('DELETE FROM wish_list WHERE customer_id_fk = ? AND wine_id_fk = ?');
        $statement->execute([$_cId, $_wId]);
        if ($statement->rowCount() > 0) {
            return true;
        }
        return false;
    }
?>