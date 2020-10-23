<?php

namespace App {
    class Shop extends MethodCall
    {
        private $postCountPage = 9;
        public function __construct()
        {
            $this->format_options();
            $this->format_navigate();
            $this->getCategoryList();
        }
        //выгрузить категории (PRODUCT CATEGORIES) -   НЕ  ГОТОВО
        public function getCategoryList()
        {
            $cat = new Category();
            $this->data['categories'] = $cat->getManyRows([]);
        }


        //выгрузить на страницу 9-12 товаров ($postCountPage)
        public function getPosts($category = null, $currentPage = 1, $min = null, $max = null)
        {
            $pos = new PostModel(); //заменить PostModel на ShopModel /или нет
            // $pos = new ShopModel();

            if ($category != null) {
                $this->data['posts'] = $pos->getSorted(
                    [
                        'category_id' => $category
                    ],
                    'ASC',
                    'date',
                    ($currentPage - 1) * $this->postCountPage,
                    $this->postCountPage,
                    $min,
                    $max
                );
                $this->data['pageCount'] = ceil(count($pos->getSorted(
                    [
                        'category_id' => $category
                    ],
                    'ASC',
                    'date',
                    0,
                    9999,
                    $min,
                    $max
                )) / $this->postCountPage);
            } else {
                $this->data['posts'] = $pos->getSorted([], 'ASC', 'date', ($currentPage - 1) * $this->postCountPage, $this->postCountPage, $min, $max);
                $this->data['pageCount'] = ceil(count($pos->getSorted([],'ASC', 'date', 0, 9999, $min, $max)) / $this->postCountPage);
            }
            varDump($this->data['pageCount']);
        }

        public function index()
        {
            $currentPage = empty($_GET['cpage']) ? 1 : $currentPage = intval($_GET['cpage']);
            $category_id = empty($_GET['category']) ? null : $category_id = intval($_GET['category']);
            $min = empty($_GET['min']) ? 0 : $min = intval($_GET['min']);
            $max = empty($_GET['max']) ? null : $max = intval($_GET['max']);
            // varDump($min);
            // varDump($max);
            $this->getPosts($category_id, $currentPage, $min, $max);            //  ЗАМЕНИТЬ на getProducts/ или не заменять

            View::render(
                VIEWS_PATH . 'templateView' . EXT,
                PAGES_PATH . 'shop' . EXT,
                $this->data
            );
        }

        public function getpost()
        {
            $post_id = empty($_GET['post']) ? null : intval($_GET['post']);
            $post = new PostModel();    //заменить PostModel на ShopModel /или нет
            if ($post_id != null) {
                $this->data['postdata'] = $post->getPostData($post_id);
                $comView = new CommentView();
                $this->data['comments'] = $comView->getCommentsOnePost($post_id);
            } else {
                $this->data['error'] = 'Неудача, запрошенного Вами рецепта не обнаружено';
            }

            View::render(
                VIEWS_PATH . 'templateView' . EXT,
                PAGES_PATH . 'getpost' . EXT,
                $this->data
            );
        }
        public function min_max($statusCode = 303)
        {

            $category_id = $_POST['category'];
            $min = $_POST['min'];
            $max = $_POST['max'];
            $url = "http://mythirdsite.com/shop/?" . ($category_id == null ? null : ('category=' . $category_id . '&')) . 'min=' . $min . '&max=' . $max;
            // varDump($category_id);
            header('Location: ' . $url, true, $statusCode);
            // header('Location: ' . $url);
            // varDump($url);
            // die();
        }
    }
}

//  1   создать и заполнить таблицу с товарами (shop)
//      1.1 топ 5, популярные товары (таблица shop -> колонка сколько покупали)
//  2   создать и заполнить таблицу с категориями (PRODUCT CATEGORIES)
//      2.1 добавить сюда функцию которая контролирует категории
//  3   теги? нужны?
//      3.1 таблица тегов
//          3.1.1   новая модель для етой таблицы
//      3.2 таблица соединяющая теги и посты
//          3.2.1   новая модель для етой таблицы
//  4   добавить в корзину?
