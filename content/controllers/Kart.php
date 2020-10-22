<?php

namespace App {
    class Kart extends MethodCall
    {
        public function __construct()
        {
            $this->format_options();
            $this->format_navigate();
        }
        public function index() // route  - /
        {
            View::render(
                VIEWS_PATH . 'templateView' . EXT,
                PAGES_PATH . 'cart-page' . EXT,
                $this->data
            );
        }
        public function buy_order()
        {
            // echo "заходим в метод<br>";
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            if ($email == null && $phone == null) {
                $this->data['error'] = "нужна контактная информация";
                $this->index();
                return;
            }
            $order_products = json_decode($_POST['products']);
            varDump($order_products);

            foreach ($order_products as $index => $object) {
                // получить информацию о клиенте
                // создать карточку клиента?
                // используя ID из карточки, заполнить заказ
                echo $object->{"name"};
                echo $object->{"price"};
                echo $object->{"imgSrc"};
                echo $object->{"count"};
                $post = new PostModel();
                $postId = $post->getId([
                    'title' => $object->{"name"},
                    'imgsrc' => $object->{"imgSrc"}
                ]);
                varDump($postId);
                $kart = new ShoppingKart();
                $kart->addRow([
                    'post_id' => $postId,
                    'amount' => $object->{"count"},
                    'email' => $email,
                    'phone' => $phone
                ]);
            }
        }
    }
}
