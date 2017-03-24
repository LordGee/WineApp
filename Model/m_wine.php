<?php
    class Wine implements JsonSerializable {
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

        public function jsonSerialize()
        {
            return get_object_vars($this);
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
        private $wine_id_fk;

        public function __get($name) {
            return $this->$name;
        }

        public function __set($name, $value) {
            $this->$name = $value;
        }
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

    function getWineLikeNameJson($_wine) {
        $wine = getAllWinesLikeName($_wine);
        return json_encode($wine);
    }

    function updateRSS() {
        $wines = getTenWines();
        $datetime = new DateTime();
        $rss = '<?xml version="1.0" encoding="utf-8"?>' . "\n";
        $rss .= '<rss version="2.0">' . "\n";
        $rss .= '<channel>' . "\n";
        $rss .= '<title>Ten Green Bottles</title>' . "\n";
        $rss .= '<link>http://localhost/wineapp/</link>' . "\n";
        $rss .= '<description>Update information for the Ten Green Bottles Website</description>' . "\n";
        foreach ($wines as $w) {
            $rss .= '<item>' . "\n";
            $rss .= '<title>' . $w->wine_name . ' from ' . $w->country . ' </title>' . "\n";
            $rss .= '<description>' . $w->description . '</description>' . "\n";
            $rss .= '<link>http://localhost/wineapp/wine.php?id=' . $w->wine_id . '</link>' . "\n";
            $rss .= '<pubDate>' . $datetime->format('D, d M Y H:i:s O') . '</pubDate>' . "\n";
            $rss .= '</item>' . "\n";
        }
        $rss .= '</channel>' . "\n";
        $rss .= '</rss>' . "\n";
        return $rss;
    }


?>