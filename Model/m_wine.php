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

    function addBasket($_id, $_qty) {
        if (!isset($_SESSION["basket"])) {
            $_SESSION["basket"] = array();
            $_SESSION['basketQty'] = array();
        }
        array_push($_SESSION["basket"], $_id);
        $_SESSION["basketQty"][$_id] = $_qty;
    }

    function removeBasket($_id) {
        foreach ($_SESSION["basket"] as $key => $value) {
            if ($value == $_id) {
                unset($_SESSION["basketQty"][$value]);
                unset($_SESSION["basket"][$key]);
            }
        }
    }

    function updateBasket($_id, $_qty) {
        $_SESSION["basketQty"][$_id] = $_qty;
    }

    function getTotalValue() {
        $result = 0.00;
        foreach ($_SESSION["basket"] as $key => $value) {
            $wineList = getWineById($value);
            foreach ($_SESSION["basketQty"] as $qKey => $qValue) {
                if ($value == $qKey) {
                    $result += ($wineList[0]->price_per_bottle * $qValue);
                }
            }
        }
        return $result;
    }
?>