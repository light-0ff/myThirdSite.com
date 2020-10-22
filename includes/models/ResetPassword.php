<?php

namespace App {
    class ResetPassword extends DBEngine
    {
        public function __construct()
        {
            parent::__construct('resetpasswords');
        }
        
    }
}
