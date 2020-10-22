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
        public function getPosts($category = null, $currentPage = 1)
        {
            $pos = new PostModel(); //заменить PostModel на ShopModel /или нет
            // $pos = new ShopModel();

            if ($category != null) {
                $this->data['posts'] = $pos->getManyRows(
                    [
                        'category_id' => $category
                    ],
                    'ASC',
                    'date',
                    ($currentPage - 1) * $this->postCountPage,
                    $this->postCountPage
                );
                $this->data['pageCount'] = ceil(count($pos->getManyRows(
                    [
                        'category_id' => $category
                    ]
                )) / $this->postCountPage);
            } else {
                $this->data['posts'] = $pos->getManyRows([], 'ASC', 'date', ($currentPage - 1) * $this->postCountPage, $this->postCountPage);
                $this->data['pageCount'] = ceil(count($pos->getManyRows()) / $this->postCountPage);
            }
        }

        public function index()
        {
            $currentPage = empty($_GET['cpage']) ? 1 : $currentPage = intval($_GET['cpage']);
            $category_id = empty($_GET['category']) ? null : $category_id = intval($_GET['category']);
            $this->getPosts($category_id, $currentPage);            //  ЗАМЕНИТЬ на getProducts/ или не заменять

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
        public function min_max()
        {
            $min = $_POST['min'];
            $max = $_POST['max'];
            $post = new PostModel();
            $post->getManyRows([
                'price >'=> $min,
                'price <'=> $max
            ]);
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
