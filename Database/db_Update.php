<?php

    class Update extends DbConnection {
        protected $pdo;

        public function __construct() {
            parent::__construct();
            $this->pdo = $this->getPdo();
        }

        function updateQP($_q, array $_p) {
            $statement = $this->pdo->prepare($_q);
            $result = $statement->execute($_p);
            return $result;
        }
    }

    class UpdateObject extends Update {
        // Stock
        function updateStockAfterSale($_wId, $_qty) {
            $q = "UPDATE stock_hold SET quantity = quantity - ? WHERE wine_id_fk = ?";
            $p = [$_qty, $_wId];
            return $this->updateQP($q, $p);
        }

        function setNewStock($_wId, $_qty) {
            $q = "UPDATE stock_hold SET quantity = quantity + ? WHERE wine_id_fk = ?";
            $p = [$_qty, $_wId];
            return $this->updateQP($q, $p);
        }

        // Wine
        function updateWine($_wId, $_wName, $_wCoun, $_wSize, $_wDesc, $_wPric, $_wLink, $_wCat, $_lvl) {
            $q = "UPDATE wine SET wine_name = ?, country = ?, bottle_size = ?, description = ?, price_per_bottle = ?, asset_link = ?, category_id_fk = ?, lvl = ? WHERE wine_id = ?";
            $p = [$_wName, $_wCoun, $_wSize, $_wDesc, $_wPric, $_wLink, $_wCat, $_lvl, $_wId];
            return $this->updateQP($q, $p);
        }

        // Customer
        function setAuthorisation($_cId, $_auth) {
            $q = "UPDATE customer SET reset_code = ?, reset_time = NOW() WHERE customer_id = ?";
            $p = [$_auth, $_cId];
            return $this->updateQP($q, $p);
        }

        function unsetAuthorisation($_cId) {
            $q = "UPDATE customer SET reset_code = null, reset_time = null WHERE customer_id = ?";
            $p = [$_cId];
            return $this->updateQP($q, $p);
        }

        function updatePassword($_p, $_auth, $_cId) {
            $q = "UPDATE customer SET password = ? WHERE reset_code = ? AND customer_id = ?";
            $p = [$_p, $_auth, $_cId];
            return $this->updateQP($q, $p);
        }

        function setUserAsAdmin($_m, $_cId) {
            $q = "UPDATE customer SET access = ? WHERE customer_id = ?";
            $p = [$_m, $_cId];
            return $this->updateQP($q, $p);
        }

        // Campaign
        function updateCampaignLine($_clId, $_sd, $_fd) {
            $q = "UPDATE campaign_line SET start_date = ?, finish_date = ? WHERE campaign_line_id = ?";
            $p = [$_sd, $_fd, $_clId];
            return $this->updateQP($q, $p);
        }
    }










?>