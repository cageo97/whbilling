<?php
    namespace backend\functions;

    use backend\models\users;

    class useractions {

        public function getby_email($email) {
            return users::where('email', $email)->first();
        }

        public function getby_id($id) {
            return users::where('id', $id)->first();
        }

        public function login($email, $password) {
            $userdata = $this->getby_email($email);

            if(password_verify($password, $userdata["password"])) {
                return $userdata["id"];
            }
        }

        public function create($email, $password) {
            $password_hash = password_hash($password, PASSWORD_BCRYPT);

            return users::create([
                "email" => $email,
                "password" => $password_hash
            ])->id;
        }

        public function list() {
            return users::get();
        }

    }