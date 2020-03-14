<?php
    namespace backend\controllers;

    class authcontrol extends controller {

        public function login($rq, $re, $args) {

            if($rq->isPost()) {
                $email = $rq->getParam("email");
                $password = $rq->getParam("password");

                if(empty($email) || empty($password)) {
                    $error = "All fields are required";
                } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $error = "Invalid email format";
                } elseif($uid = $useractions->login($email, $password)) {
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

    }
?>