<?php

namespace App {
    class UserAutorization
    {
        private $currentUser = null;
        private $user = null;
        public function __construct()
        {
            $this->user = new User();
        }
        public function __destruct()
        {
            unset($this->user);
        }
        public function isAuth()
        {
            // varDump($this->currentUser);
            //return $this->currentUser == null ? false:true;
            return isset($_SESSION['user_id']);
        }
        public function isUserValid($email, $password)
        {
            $user = new User();
            $query = "SELECT users.id, users.email, users.password, roles.role 
            FROM users, roles 
                WHERE users.role_id = roles.id AND
                       users.email = '$email' AND
                       users.password = '$password'";
            $result = $user->executeQuery($query);
            if (count($result) == 0) {
                return false;
            } else if (count($result) == 1) {
                $this->currentUser = $result[0];
                return true;
            }
        }
        public function getUserInfo()
        {
            if ($this->isAuth()) {
                if ($this->currentUser == null) {
                    $id = $_SESSION['user_id'];
                    $query = "SELECT users.id, users.email, roles.role, usercards.fio, usercards.avatar, 
                            usercards.description, usercards.skils 
                            FROM users 
                            LEFT JOIN roles ON users.role_id = roles.id 
                            LEFT JOIN usercards ON users.id = usercards.user_id 
                            WHERE users.id = $id;";
                    // varDump($query);
                    return $this->user->executeQuery($query)[0];
                } else {
                    return $this->currentUser;
                }
            }
            return $this->currentUser == null ? null : $this->currentUser;
        }
    }
}
