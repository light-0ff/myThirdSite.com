<?php

namespace App {
    class Post extends MethodCall
    {
        private $postCountPage = 6;
        public function __construct()
        {
            $this->format_options();
            $this->format_navigate();
            $this->getCategoryList();
        }
        public function getCategoryList()
        {
            $cat = new Category();
            $this->data['categories'] = $cat->getManyRows([]);
        }

        public function getPosts($category = null, $currentPage = 1)
        {
            $pos = new PostModel();
            //$this->data['pageCount'] = ceil(count($pos->getManyRows()) / 6);

            if ($category != null) {
                $this->data['posts'] = $pos->getManyRows(
                    [
                        'category_id' => $category // ограничение по типу блюда
                    ],
                    'ASC',
                    'date',
                    ($currentPage - 1) * $this->postCountPage,
                    $this->postCountPage
                );
                $this->data['pageCount'] = ceil(count($pos->getManyRows(
                    [
                        'category_id' => $category // ограничение по типу блюда
                    ]
                )) / 6);
            } else {
                $this->data['posts'] = $pos->getManyRows([], 'ASC', 'date', ($currentPage - 1) * $this->postCountPage, $this->postCountPage);
                $this->data['pageCount'] = ceil(count($pos->getManyRows()) / 6);
            }
            //varDump($this->data['posts']);
            // varDump($this->data['posts']);
        }
        public function index() // route  - /
        {
            $currentPage = empty($_GET['cpage']) ? 1 : $currentPage = intval($_GET['cpage']);
            $category_id = empty($_GET['category']) ? null : $category_id = intval($_GET['category']);
            $this->getPosts($category_id, $currentPage);

            View::render(
                VIEWS_PATH . 'templateView' . EXT,
                PAGES_PATH . 'blog' . EXT,
                $this->data
            );
        }

        // адрес одного товара
        public function getpost()
        {
            $post_id = empty($_GET['post']) ? null : intval($_GET['post']);
            $post = new PostModel();
            if ($post_id != null) {
                $this->data['postdata'] = $post->getPostData($post_id);
                $comView = new CommentView();
                $this->data['comments'] = $comView->getCommentsOnePost($post_id);
                // varDump($this->data['comments'][0]['id']);
                // varDump(isChield($this->data['comments']));
            } else {
                $this->data['error'] = 'Неудача, запрошенного Вами рецепта не обнаружено';
            }
            // varDump($this->data);
            View::render(
                VIEWS_PATH . 'templateView' . EXT,
                // PAGES_PATH . 'getpost' . EXT,
                PAGES_PATH . 'blog-detail' . EXT,
                $this->data
            );
        }
        public function add_coment()
        {
            $post_id = $_POST['postId'];

            $parentId = $_POST['parentId']; // родительский комментарий
            if($parentId == "0") $parentId = null;
            $new_comment = $_POST['comment'];
            if ($new_comment == "" || $post_id == "") {
                $this->data['error'] = 'комментарий не может быть пустым';
                return;
            }
            $comments = new Comment();
            // varDump($post_id);
            // varDump($parentId);
            // varDump($new_comment);

            //*
            $comments->addRow([
                'post_id' => $post_id,
                'parent_id' => $parentId,
                'comment' => $new_comment,
                'user_id' => 6 //заглушка
            ]);
            $this->index(); //перейти еа тотже пост
            //*/
        }
    }
}
