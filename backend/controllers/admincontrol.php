<?php
    namespace backend\controllers;

    class admincontrol extends controller {

        public function index($rq, $re) {
            return $this->container->view->render($re, "admin/index.twig");
        }

        public function client($rq, $re) {

            return $this->container->view->render($re, "admin/client.twig", [
                "clients" => $this->container->useractions->list()
            ]);
        }

        public function client_add($rq, $re) {

            if($rq->isPost()) {
                $email = $rq->getParam("email");
                $password = $rq->getParam("password");
                $password_confirm = $rq->getParam("password_confirm");

                if(empty($email) || empty($password)) {
                    $error = "All fields are required";
                } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $error = "Invalid email format";
                } elseif($this->container->useractions->getby_email($email)) {
                    $error = "This email is taken";
                } elseif($password != $password_confirm) {
                    $error = "Passwords much match";
                } elseif($this->container->useractions->create($email, $password)) {
                    $success = true;
                }

            }

            return $this->container->view->render($re, "admin/client_action.twig", [
                "form" => [
                    "error" => $error,
                    "success" => $success,
                    "email" => $email
                ]
            ]);
        }

        public function client_edit($rq, $re) {
            return $this->container->view->render($re, "admin/client_action.twig");
        }

        public function product($rq, $re) {
            return $this->container->view->render($re, "admin/product.twig", [
                "products" => $this->container->productactions->listby_category('')
            ]);
        }

        public function product_action($rq, $re) {

            if($rq->isPost()) {
                $name = $rq->getParam("name");
                $description = $rq->getParam("description");

                $this->container->productactions->create($name, $description, "");
            }

            return $this->container->view->render($re, "admin/product_action.twig");
        }

        public function settings($rq, $re) {
            return $this->container->view->render($re, "admin/settings.twig");
        }

    }