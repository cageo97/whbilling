<?php
    namespace backend\controllers;

    class maincontrol extends controller {

        public function buy($rq, $re, $args) {
            return $this->container->view->render($re, "buy.twig", [
                "products" => $this->container->productactions->listby_category()
            ]);
        }

        public function buy_product($rq, $re, $args) {
            $id = $args["id"];

            $product = $this->container->productactions->getby_id($id);

            if(!$product) {
                echo "Product not found";
                die();
            }

            if($rq->isPost()) {
                $iid = $this->container->invoiceactions->create($_SESSION["uid"], $id, 0);
                return $re->withRedirect("/");
            }

            return $this->container->view->render($re, "buy_product.twig", [
                "product" => $product
            ]);
        }

        public function index($rq, $re, $args) {
            return $this->container->view->render($re, "index.twig");
        }

        public function services($rq, $re, $args) {
            return $this->container->view->render($re, "services.twig");
        }

        public function billing($rq, $re, $args) {
            return $this->container->view->render($re, "billing.twig");
        }

    }
?>