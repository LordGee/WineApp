<?php
    class WishList {
        private $wish_list_id;
        private $watch;
        private $last_modified;
        private $customer_id_fk;
        private $wine_id_fk;

        function __get($name) {
            return $this->$name;
        }

        function __set($name,$value) {
            $this->$name = $value;
        }
    }
?>