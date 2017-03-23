<?php 
    class Campaign {
        private $campaign_id;
        private $offer_name;
        private $asset_link;
        private $alt_description;

        public function __get($name) {
            return $this->$name;
        }

        public function __set($name, $value) {
            $this->$name = $value;
        }
    }
    
    class CampaignLine {
        private $campaign_line_id;
        private $start_date;
        private $finish_date;

        public function __get($name) {
            return $this->$name;
        }

        public function __set($name, $value) {
            $this->$name = $value;
        }
    }
?>