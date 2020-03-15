<?php
    namespace backend\functions;

    use backend\models\products;

    class productactions {

        public function listby_category($category='') {
            return products::get();
        }


    }