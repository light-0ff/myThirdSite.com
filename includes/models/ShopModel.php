<?php

namespace App {
    class ShopModel extends DBEngine
    {
        public function __construct()
        {
            parent::__construct('shop');
        }
        public function getPostData($post_id){
            return $this->getOneRow($post_id);
        }
    }
    
}