<?php
    namespace backend\functions;

    use backend\models\invoices;

    class invoiceactions {

        public function create($uid, $pid, $price) {
            return invoices::create([
                "uid" => $uid,
                "pid" => $pid,
                "price" => $price 
            ])->id;
        }

    }