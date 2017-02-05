<?php
    class Wine {
        private $wine_id;
        private $wine_name;
        private $country;
        private $description;
        private $price_per_bottle;
        private $bottles_per_case;
        private $asset_link;

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
    }

    class StockHold {
        private $stock_hold_id;
        private $quantity;
    }
?>