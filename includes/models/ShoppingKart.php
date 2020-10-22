<?php

namespace App {
    class ShoppingKart extends DBEngine
    {
        public function __construct()
        {
            parent::__construct('shoppingkart');
        }
        public function makeOrder($title, $imgsrc, $price, $howmuch)
        {
            // $product = new PostModel();
            // $product_id = $product->getId([
            //     'title' => $title,
            //     'imgsrc' => $imgsrc
            // ]);
            // $this->addRow([
            //     'product_id' => $product_id,
            //     'howmuch' => $howmuch
            // ]);
        }
    }
}
