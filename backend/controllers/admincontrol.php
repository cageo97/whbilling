<?php
    namespace backend\controllers;

    class admincontrol extends controller {

        public function index($rq, $re) {
            return $this->container->view->render($re, "admin/index.twig");
        }

    }