<?php
    class payments_bitcoin {

        public $name = "Bitcoin";
        public $description = "A Bitcoin payment gateway";

        public function display() {
            return '<form action=""><button>Pay Now</button></form>';
        }

        public function callback() {
            
        }

    }