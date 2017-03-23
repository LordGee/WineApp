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

    function removeCampaignLine($_clId) {
        global $pdo;
        $statement = $pdo->prepare('DELETE FROM campaign_line WHERE campaign_line_id = ?');
        $statement->execute([$_clId]);
        if ($statement->rowCount() > 0) {
            return true;
        }
        return false;
    }

    function removeCampaignLineByIds($_cId, $_wId) {
        global $pdo;
        $statement = $pdo->prepare('DELETE FROM campaign_line WHERE campaign_id_fk = ? AND wine_id_fk = ?');
        $statement->execute([$_cId, $_wId]);
        if ($statement->rowCount() > 0) {
            return true;
        }
        return false;
    }
?>