<?php

namespace App {
    class User extends DBEngine
    {
        public function __construct()
        {
            parent::__construct('users');
        }
        public function createUser($login, $email, $password, $role = 1)
        {
            $this->addRow(
                [
                    'login' => $login,
                    'email' => $email,
                    'password' => $password,
                    'role_id' => $role
                ]
            );
        }
    }
}