<?php

namespace App {
    class Main extends MethodCall
    {
        private $userAuth = null;
        public function __construct()
        {
			//  галочки на товарах
            //  кнопка карзины ПОСТит товар и переходит на страницу карзины
            //  (страница карзины) удалять товар(ок)    продолжать поиск
			/*
            $this->userAuth = new UserAutorization();
            $this->data['userprofile'] = $this->userAuth->getUserInfo();
			*/
            $this->format_options();
            $this->format_navigate();
        }

        public function index() // route
        {
            $fs = new FrontSlider();
            $this->data['front_slider'] = $fs->getManyRows([]);
            View::render(
                VIEWS_PATH . 'templateView' . EXT,
                PAGES_PATH . 'home' . EXT,
                $this->data
            );
        }
        public function notifyme()        {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $email = $_POST['email'];
                $sub = new Subscriber();
                if ($sub->addRow([
                    'email' => $email
                ])) {
                    mail($email, 'Благодарим за регистрацию', 'У тю-тю');
                } else {
                    $this->data['error'] = "адрес для рассылки не добавлен";
                }
            }
            $this->index();
        }
        // ---------------  регистрация ---------------------------
        public function login()
        {
            View::render(
                VIEWS_PATH . 'templateView' . EXT,
                PAGES_PATH . 'login' . EXT,
                $this->data
            );
        }
        public function register()
        {
            View::render(
                VIEWS_PATH . 'templateView' . EXT,
                PAGES_PATH . 'register' . EXT,
                $this->data
            );
        }
        public function checkuser()
        {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $email = $_POST['email'];
                $password = $_POST['password'];
                // echo $email."+".$password;
                $password = hash('sha256', $password);

                //is user valid
                if ($this->userAuth->isUserValid($email, $password)) {
                    //session_start();
                    $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
                    $_SESSION['user_id'] = $this->userAuth->getUserInfo()['id'];
                    $this->index();
                    return;
                } else {
                    $this->data['error'] = 'Авторизация неуспешна';
                }
            }
            $this->login();
        }
        public function logout()
        {
            unset($_SESSION['ip']);
            unset($_SESSION['user_id']);
            session_destroy();
            $this->index();
        }
        public function createuser()
        {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $login = $_POST['login'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                // echo $login . "+" . $email . "+" . $password;
                $password = hash('sha256', $password);

                $newUser = new User();
                $newUser->createUser($login, $email, $password);
                //--------------------------------------------------------------
                if ($this->userAuth->isUserValid($email, $password)) {
                    $this->index();
                    $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
                    $_SESSION['user_id'] = $this->userAuth->getUserInfo()['id'];
                    $this->index();
                } else {
                    $this->data['error'] = 'Авторизация неуспешна';
                }
            }
            $this->register();
        }
        public function changepassword()
        {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $email = $_POST['email'];
                // проверить пользователя на существование
                $user = new User();
                $user_id = $user->getId([
                    'email' => $email
                ]);
                if ($user_id == null) {
                    $this->data['error'] = 'неверно введенный email, либо введенный вами email не существует';

                } else {
                    $hash = password_hash($user_id . $email, PASSWORD_DEFAULT);
                    $resPass = new ResetPassword();
                    $resPass->addRow([
                        'user_id' => $user_id,
                        'hash' => $hash
                    ]);
                    $ref = $_SERVER['SERVER_NAME'] . '/admin/resetpasswordcheck/?hash=' . $hash;
                    // echo $ref;
                    mail($email, "Сброс пароля", $ref);
                    $this->data['succsess'] = 'сообщение отправленно, проверте вашу почту';
                    $this->forgotpassword();
                }
            }
        }
        public function resetpasswordcheck()
        {
            // сравниваем с хешем
            $hash = $_GET['hash'];
            $reset = new ResetPassword();
            $reset_id = $reset->getId(['hash' => $hash]);
            if ($_SERVER['REQUEST_METHOD'] == "GET") {
                $query = "SELECT TIMESTAMPDIFF(MINUTE, ( 
                    SELECT resetpasswords.date FROM resetpasswords 
                    WHERE resetpasswords.hash = '$hash' AND resetpasswords.status = 'OPEN'
                ), CURRENT_TIMESTAMP )";
                $result = $reset->executeQuery($query);
                foreach ($result[0] as $key => $value) {
                    $result = $value;
                }
                if ($result <= 60) {
                    AdminView::render(
                        VIEWS_PATH . 'adminview' . EXT,
                        [PAGES_PATH . 'resetpasswordcheck' . EXT],
                        $this->data
                    );
                }
                $reset->updateRow($reset_id, ['status' => 'CLOSE']);
            }
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $password = $_POST['password'];
                $password = hash('sha256', $password);
                $user = new User();
                $user->updateRow("(SELECT user_id FROM resetpasswords WHERE resetpasswords.hash = '$hash')", ['password' => $password]);
                $reset->updateRow($reset_id, ['status' => 'CLOSE']);
                $this->login();
            }
        }
        public function forgotpassword()
        {
            AdminView::render(
                VIEWS_PATH . 'adminview' . EXT,
                [PAGES_PATH . 'forgotpassword' . EXT],
                $this->data
            );
        }
        // ------------------------------------------------------------------------------------
        
    }
}
