<?php
    namespace backend\functions;

    use backend\models\products;

    class productactions {

        public function create($name, $description, $pricing) {
            return products::create([
                "name" => $name,
                "description" => $description,
                "pricing" => $pricing
            ])->id;
        }

        public function listby_category($category='') {
            return products::get();
        }

        public function getby_id($id) {
            return products::where('id', $id)->first();
        }


    }