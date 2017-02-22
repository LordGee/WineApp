<?php
    class Customer_Order {
        private $customer_order_id;
        private $order_date;
        private $total_value;
        private $payment_id_fk;
        private $address_id_fk;
        private $customer_id_fk;

        public function __get($name) {
            return $this->$name;
        }

        public function __set($name, $value) {
            $this->$name = $value;
        }
    }

    class Customer_Order_Line {
        private $customer_order_line_id;
        private $line_value;
        private $quantity;
        private $wine_id_fk;
        private $customer_order_id_fk;

        public function __get($name) {
            return $this->$name;
        }

        public function __set($name, $value) {
            $this->$name = $value;
        }
    }
?>
