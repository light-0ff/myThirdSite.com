<?php

namespace App {
    class Subscriber extends DBEngine
    {
        public function __construct()
        {
            parent::__construct('subscribers');
        }
    }
}