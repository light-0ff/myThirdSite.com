<?php

namespace App {
    class Comment extends DBEngine
    {
        public function __construct()
        {
            parent::__construct('comments');
        }
        // public function new_comment($name, $date)
        // {
        //    $this->executeQuery("");
        // }
    }
}