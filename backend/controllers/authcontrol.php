<?php
    namespace backend\controllers;

    class authcontrol extends controller {

        public function login($rq, $re) {

            if($rq->isPost()) {
                $email = $rq->getParam("email");
                $password = $rq->getParam("password");

                if(empty($email) || empty($password)) {
                    $error = "All fields are required";
                } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $error = "Invalid email format";
                } elseif($uid = $this->container->useractions->login($email, $password)) {
                    $_SESSION["uid"] = $uid;
                    return $re->withRedirect('/');
                } else {
                    $error = "Invalid email or password";
                }
            }

            return $this->container->view->render($re, "auth/login.twig", [
                "form" => [
                    "error" => $error,
                    "email" => $email
                ]
            ]);
        }

        public function register($rq, $re) {

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
                } elseif($uid = $this->container->useractions->create($email, $password)) {
                    $_SESSION["uid"] = $uid;
                    return $re->withRedirect('/');
                }
            }

            return $this->container->view->render($re, "auth/register.twig", [
                "form" => [
                    "error" => $error,
                    "email" => $email
                ]
            ]);
        }

    }
?>