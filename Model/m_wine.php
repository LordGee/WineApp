<?php
    class Wine {
        private $wine_id;
        private $wine_name;
        private $country;
        private $description;
        private $price_per_bottle;
        private $bottles_per_case;
        private $asset_link;
        private $category_id_fk;
        private $category_id;
        private $wine_colour;
        private $wine_type;

        function __get($name) {
            return $this->$name;
        }

        function __set($name,$value) {
            $this->$name = $value;
        }
    }

    class Category {
        private $category_id;
        private $wine_colour;
        private $wine_type;

        function __get($name) {
            return $this->$name;
        }

        function __set($name,$value) {
            $this->$name = $value;
        }
    }

    class StockHold {
        private $stock_hold_id;
        private $quantity;
    }
?>