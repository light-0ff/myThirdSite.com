<?php

namespace App {
    class Navigate extends MethodCall
    {
        private $userAuth = null;
        public function __construct()
        {
            $this->userAuth = new UserAutorization();
        }

        public function index() // route  - /
        {
            if ($this->userAuth->isAuth()) {
                View::render(
                    VIEWS_PATH . 'adminview' . EXT,
                    PAGES_PATH . 'main' . EXT,
                    $this->data
                );
            } 
        }
        public function register()
        {
            View::render(
                VIEWS_PATH . 'adminview' . EXT,
                PAGES_PATH . 'register' . EXT,
                $this->data
            );
        }
        public function forgotpassword()
        {
            View::render(
                VIEWS_PATH . 'adminview' . EXT,
                PAGES_PATH . 'forgotpassword' . EXT,
                $this->data
            );
        }
        public function logout()
        {
            unset($_SESSION['ip']);
            unset($_SESSION['user_id']);
            session_destroy();
            $this->index();
        }   
    }
}
