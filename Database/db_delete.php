<?php

    class Delete extends DbConnection {
        protected $pdo;

        public function __construct() {
            parent::__construct();
            $this->pdo = $this->getPdo();
        }

        function deleteQP($_q, array $_p) {
            $statement = $this->pdo->prepare("$_q");
            $statement->execute($_p);
            if ($statement->rowCount() > 0) {
                return true;
            }
            return false;
        }
    }

    class DeleteObject extends Delete {

        function removeWineFromWishList($_wId, $_cId) {
            $q = 'DELETE FROM wish_list WHERE customer_id_fk = ? AND wine_id_fk = ?';
            $p = [$_cId, $_wId];
            return $this->deleteQP($q, $p);
        }

        function removeCampaignLine($_clId) {
            $q = 'DELETE FROM campaign_line WHERE campaign_line_id = ?';
            $p = [$_clId];
            return $this->deleteQP($q, $p);
        }

        function removeCampaignLineByIds($_cId, $_wId) {
            $q = 'DELETE FROM campaign_line WHERE campaign_id_fk = ? AND wine_id_fk = ?';
            $p = [$_cId, $_wId];
            return $this->deleteQP($q, $p);
        }

        function removeWineById($_id) {
            $q = 'DELETE FROM wine WHERE wine_id = ?';
            $p = [$_id];
            return $this->deleteQP($q, $p);
        }

        function removeStockByWineId($_id) {
            $q = 'DELETE FROM stock_hold WHERE wine_id_fk = ?';
            $p = [$_id];
            return $this->deleteQP($q, $p);
        }
    }
?>