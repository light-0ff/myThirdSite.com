<?php

namespace App {
    class AboutUs extends MethodCall
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
                PAGES_PATH . 'about-us' . EXT,
                $this->data
            );
        }
    }
}
// вывод "нашей команды"
// 1) Co - Founder & CEO
// 2) Chief Of Marketing Team
// 3) Art Director