<?php

namespace App {
    class AdminView extends MethodCall
    {
        public static function render($templateView, $contentViews=[], $data = null)
        {
            require $templateView;
        }
    }
}
