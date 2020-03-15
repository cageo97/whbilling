<?php
    namespace backend\controllers;

    class maincontrol extends controller {

        public function buy($rq, $re, $args) {
            return $this->container->view->render($re, "buy.twig", [
                "products" => $this->container->productactions->listby_category()
            ]);
        }

        public function buy_product($rq, $re, $args) {
            return $this->container->view->render($re, "buy_product.twig");
        }

        public function index($rq, $re, $args) {
            return $this->container->view->render($re, "index.twig");
        }

        public function services($rq, $re, $args) {
            return $this->container->view->render($re, "services.twig");
        }

    }
?>