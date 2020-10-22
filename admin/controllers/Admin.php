<?php

namespace App {
    class Admin extends MethodCall
    {
        private $userAuth = null;
        public function __construct()
        {
            $this->userAuth = new UserAutorization();
            $this->data['userprofile'] = $this->userAuth->getUserInfo();
            $category = new CategoryModel;
            $this->data['categories'] = $category->getManyRows([]);
        }
        public function login()
        {
            AdminView::render(
                VIEWS_PATH . 'adminview' . EXT,
                [PAGES_PATH . 'login' . EXT],
                $this->data
            );
        }
        public function index() // route  - /
        {
            if ($this->userAuth->isAuth() == true) {
                AdminView::render(
                    VIEWS_PATH . 'adminview' . EXT,
                    [
                        VIEWS_PATH . 'header' . EXT,
                        VIEWS_PATH . 'aside' . EXT,
                        PAGES_PATH . 'main' . EXT,
                        VIEWS_PATH . 'footer' . EXT
                    ],
                    $this->data
                );
                return;
            } else {
                $this->login();
            }
        }
        public function register()
        {
            AdminView::render(
                VIEWS_PATH . 'adminview' . EXT,
                [PAGES_PATH . 'register' . EXT],
                $this->data
            );
        }
        public function forgotpassword()
        {
            AdminView::render(
                VIEWS_PATH . 'adminview' . EXT,
                [PAGES_PATH . 'forgotpassword' . EXT],
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
                    // echo "неверно введенный email, либо введенный вами email не существует";
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
                // $this->index();
                // сгенирировать (одноразовый) "ключь" для смены пароля
                // отправить ключь пользователю
                // где хранить ключь
                // срок жизни ключа

                // сравнить хеш
                // перебросить на новую страницу
                // спросить новый пароль
                // sql запрос на update password

                /*$newpassword = $_POST['newpassword'];
                $user = new User();
                $query = "UPDATE users
                SET users.password = $newpassword
                WHERE users.email = $email";
                $result = $user->executeQuery($query);*/
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
        // ------------------------------------------------------------------------------------
        public function navigate()
        {
            if ($this->userAuth->isAuth() == true) {
                $nav = new NavBar();
                $this->data['navigate'] = $nav->getManyRows([]);
                //varDump( $this->data['navigate']);
                AdminView::render(
                    VIEWS_PATH . 'adminview' . EXT,
                    [
                        VIEWS_PATH . 'header' . EXT,
                        VIEWS_PATH . 'aside' . EXT,
                        PAGES_PATH . 'navigate' . EXT,
                        VIEWS_PATH . 'footer' . EXT
                    ],
                    $this->data
                );
                return;
            } else {
                $this->login();
            }
        }
        //Определение, какая кнопка в панели навигации была нажата
        public function actionchoice()
        {
            if (array_key_exists('save', $_POST)) {
                $this->nav_save();
            } else if (array_key_exists('delete', $_POST)) {
                $this->nav_delete();
                // } else if (array_key_exists('onepost', $_POST)) {
                //     $this->get_one_post();
                // } else if (array_key_exists('savecatpostok', $_POST)) {
                //     $this->post_category();
            }
        }

        //Сохранение изменений
        public function nav_save()
        {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $href = $_POST['href'];
            $order_id = $_POST['order_id'];
            $parent_id = $_POST['parent_id'];
            $nav = new NavBar();
            if ($nav->updateRow($id, [
                'title' => $title,
                'href' => $href,
                'order_id' => $order_id,
                'parent_id' => $parent_id
            ]) == true) {
                header('Location: /admin/navigate'); //$this->navigate();
            };
        }

        //Удаление элемента навигации
        public function nav_delete()
        {
            $id = $_POST['id'];
            $nav = new NavBar();
            if ($nav->deleteRow($id) == true) {
                $this->navigate();
            };
        }

        //Добавление элемента навигации
        public function nav_add()
        {
            $title = $_POST['title'];
            $href = $_POST['href'];
            $order_id = $_POST['order_id'];
            $parent_id = $_POST['parent_id'];
            $nav = new NavBar();

            if ($nav->addRow([
                'title' => $title,
                'href' => $href,
                'order_id' => $order_id,
                'parent_id' => $parent_id
            ]) == true) {
                $this->navigate();
            };
        }


        // ------------------------------------------------------------------------------------
        public function post_choice()
        {
            if (array_key_exists('onepost', $_POST)) {
                $this->get_one_post();
            } else if (array_key_exists('savecatpostok', $_POST)) {
                $this->post_category();
            } else if (array_key_exists('editpost', $_POST)) {
                $this->post_update();
            }else if (array_key_exists('newpostedit', $_POST)) {
                $this->new_post_edit();
            }else if (array_key_exists('addnewpost', $_POST)) {
                $this->add_new_post();
            }
        }
        public function get_one_post()
        {
            if ($this->userAuth->isAuth() == true) {
                $post_id = $_POST['id'];
                // varDump( $post_id);
                $post = new PostModel();
                if ($post_id != null) {
                    $this->data['postdata'] = $post->getPostData($post_id);
                    $comView = new CommentView();
                    $this->data['comments'] = $comView->getCommentsOnePost($post_id);
                } else {
                    $this->data['error'] = 'Неудача, запрошенного Вами поста не обнаружено';
                }
                AdminView::render(
                    VIEWS_PATH . 'adminview' . EXT,
                    [
                        VIEWS_PATH . 'header' . EXT,
                        VIEWS_PATH . 'aside' . EXT,
                        PAGES_PATH . 'editpost' . EXT,
                        VIEWS_PATH . 'footer' . EXT
                    ],
                    $this->data
                );
                return;
            } else {
                $this->login();
            }
        }
       
        public function post_update()
        {
            $id = $_POST['id'];
            $category_id = $_POST['currentcateg_id'];
            $title = $_POST['title'];
            $slogan = $_POST['slogan'];
            // $imgsrc = $_POST['imgsrc'];
            $imgalt = $_POST['imgalt'];
            $price = $_POST['price'];
            $content = $_POST['content'];
            varDump($content);
            //*
            $nav = new PostModel();
            if ($nav->updateRow($id, [
                'category_id' => $category_id,
                'title' => $title,
                'slogan' => $slogan,
                // 'imgsrc' => $imgsrc,
                'imgalt' => $imgalt,
                'price' => $price,
                'content' => $content
            ]) == true) {
                $this->get_one_post();
            };
           // */
        }
        public function post_category()
        {
            $post_id = $_POST['id'];
            $category_id = $_POST['currentcateg_id'];
            $nav = new PostModel();
            if ($nav->updateRow($post_id, [
                'category_id' => $category_id,
            ]) == true) {
                $this->posts();
            };
        }
        public function posts()
        {
            if ($this->userAuth->isAuth() == true) {
                // $nav = new PostModel();
                // $this->data['posts'] = $nav->getManyRows([]);
                $currentPage = empty($_GET['cpage']) ? 1 : $currentPage = intval($_GET['cpage']);
                $category_id = empty($_GET['category']) ? null : $category_id = intval($_GET['category']);
                $this->getPosts($category_id, $currentPage);
                AdminView::render(
                    VIEWS_PATH . 'adminview' . EXT,
                    [
                        VIEWS_PATH . 'header' . EXT,
                        VIEWS_PATH . 'aside' . EXT,
                        PAGES_PATH . 'posts' . EXT,
                        VIEWS_PATH . 'footer' . EXT
                    ],
                    $this->data
                );
                return;
            } else {
                $this->login();
            }
        }
        public function getPosts($category = null, $currentPage = 1)
        {
            $postCountPage = 10;
            $pos = new PostModel();
            if ($category != null) {
                $this->data['posts'] = $pos->getManyRows(
                    [
                        'category_id' => $category // ограничение по типу блюда
                    ],
                    'ASC',
                    'date',
                    ($currentPage - 1) * $postCountPage,
                    $postCountPage
                );
                $this->data['pageCount'] = ceil(count($pos->getManyRows(
                    [
                        'category_id' => $category // ограничение по типу блюда
                    ]
                )) / $postCountPage);
            } else {
                $this->data['posts'] = $pos->getManyRows([], 'ASC', 'date', ($currentPage - 1) * $postCountPage, $postCountPage);
                $this->data['pageCount'] = ceil(count($pos->getManyRows()) / $postCountPage);
            }
            AdminView::render(
                VIEWS_PATH . 'adminview' . EXT,
                [
                    VIEWS_PATH . 'header' . EXT,
                    VIEWS_PATH . 'aside' . EXT,
                    PAGES_PATH . 'posts' . EXT,
                    VIEWS_PATH . 'footer' . EXT
                ],
                $this->data
            );
        }
        public function new_post_edit()
        {
            if ($this->userAuth->isAuth() == true) {
                AdminView::render(
                    VIEWS_PATH . 'adminview' . EXT,
                    [
                        VIEWS_PATH . 'header' . EXT,
                        VIEWS_PATH . 'aside' . EXT,
                        PAGES_PATH . 'addpost' . EXT,
                        VIEWS_PATH . 'footer' . EXT
                    ],
                    $this->data
                );

            } else {
                $this->login();
            }
        }
        public function add_new_post()
        {
            $category_id = $_POST['currentcateg_id'];
            $title = $_POST['title'];
            $slogan = $_POST['slogan'];
            // $imgsrc = $_POST['imgsrc'];
            $imgalt = $_POST['imgalt'];
            $price = $_POST['price'];
            $content = $_POST['content'];
            varDump($category_id);
            varDump($imgalt);
            varDump($slogan);
            varDump($price);
            varDump($content);
            //*
            $nav = new PostModel();
            if ($nav->addRow([
                'category_id' => $category_id,
                'title' => $title,
                'slogan' => $slogan,
                // 'imgsrc' => $imgsrc,
                'imgalt' => $imgalt,
                'price' => $price,
                'content' => $content
            ]) == true) {
                $this->get_one_post();
            };
        }
        // ------------------------------------------------------------------------------------
        public function userprofile()
        {
            if ($this->userAuth->isAuth() == true) {
                AdminView::render(
                    VIEWS_PATH . 'adminview' . EXT,
                    [
                        VIEWS_PATH . 'header' . EXT,
                        VIEWS_PATH . 'aside' . EXT,
                        PAGES_PATH . 'userprofile' . EXT,
                        VIEWS_PATH . 'footer' . EXT
                    ],
                    $this->data
                );
            } else {
                $this->login();
            }
        }
        public function edituserprofile()
        {
            // header("Location: /admin/userprofile");
            $uploaddir = 'D:/OpenServer/domains/myThirdSite.com/admin/static/img/friends/';
            echo $uploaddir;
            echo '<br>';
            $uploaddir = IMG_PATH . 'friends' . SEP;
            echo $uploaddir;
            //  varDump($_FILES["avatar"]);
            //  echo "<br>";
            if ($_FILES["avatar"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
            } else if ($_FILES["avatar"]["size"] > 0) {
                if ($_FILES['avatar']['type'] == 'image/png') {
                    // echo $_FILES['avatar']['type'];
                    $_FILES['avatar']['name'] = 'avatar_' . uniqid() . '.png';
                    $uploadfile = $uploaddir . basename($_FILES['avatar']['name']);
                } else if ($_FILES['avatar']['type'] == 'image/jpeg') {
                    $_FILES['avatar']['name'] = 'avatar_' . uniqid() . '.jpeg';
                    $uploadfile = $uploaddir . basename($_FILES['avatar']['name']);
                }
                if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadfile)) {
                    $this->data['succsess'] = "Файл корректен и был успешно загружен.";
                } else {
                    $this->data['error'] = "Неккоректный файл!\n";
                }
            }
            $user_id = $_SESSION['user_id'];
            $user = new UsersCards();
            $fio = $_POST['fio'];
            $description = $_POST['description'];
            $skils = $_POST['skils'];
            if ($_FILES["avatar"]["size"] > 0) $user->updateRow($user_id, ['avatar' => '/admin/static/img/friends/' . $_FILES['avatar']['name']]);

            $user->updateRow($user_id, [
                //  'avatar' => '/admin/static/img/friends/' . $_FILES['avatar']['name'],
                'fio' => $fio,
                'description' => $description,
                'skils' => $skils
            ]);
            header("Location: /admin/userprofile");
        }
    }
}
