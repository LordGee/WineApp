<?php
    class Customer implements JsonSerializable { //
        private $customer_id;
        private $first_name;
        private $last_name;
        private $phone_number;
        private $email_address;
        private $password;
        private $address_id_fk;

        public function __get($name) {
            return $this->$name;
        }

        public function __set($name, $value) {
            $this->$name = $value;
        }

        public function jsonSerialize()
        {
            return [
                "customer_id" => $this->customer_id,
                "first_name" => $this->first_name,
                "last_name" => $this->last_name,
                "phone_number" => $this->phone_number,
                "email_address" => $this->email_address,
                "address_id_fk" => $this->address_id_fk,
            ];
        }
    }

    class Payment {
        private $payment_id;
        private $card_type;
        private $card_name;
        private $card_number;
        private $expiry_date;

        public function __get($name) {
            return $this->$name;
        }

        public function __set($name, $value) {
            $this->$name = $value;
        }
    }

    class Address {
        private $address_id;
        private $door_number_name;
        private $street_name;
        private $city;
        private $county;
        private $post_code;

        public function __get($name) {
            return $this->$name;
        }

        public function __set($name, $value) {
            $this->$name = $value;
        }
    }

    function getUserByEmailAndPassword($_email, $_pass) {
        $_pass = encryption($_email, $_pass);
        $success = loginUser($_email, $_pass);

       return $success;
    }

    function encryption($_email, $_pass) {
        $count = strlen($_email);
        $use = ($count / 2) + 2;
        $s1 = substr($_email, 0, $use);
        $s2 = substr($_email, -$use);
        $s1encrypt = hash('sha256', $s1, false);
        $s2encrypt = hash('sha256', $s2, false);
        $_pass = hash('sha256', $_pass, false);
        $paSalt = $s2encrypt . $_pass . $s1encrypt;
        for ($i = 0; $i < $count; $i++) {
            $paSalt = hash('sha256', $paSalt, false);
        }
        return $paSalt;
    }

    function payConvert($_pCard) {
        $sub = substr($_pCard, -4);
        return $result = "**** **** **** " . $sub;
    }
?>


