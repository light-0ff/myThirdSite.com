<?php

namespace App {
    class ClientMessage extends DBEngine
	{
        public function __construct()
        {
            parent::__construct('clientmessages');
        }

        public function getAllOptions(){
            return $this->getManyRows([]);
        }
    }
}