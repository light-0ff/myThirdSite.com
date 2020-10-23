<?php

namespace App {
    class PostModel extends DBEngine
    {
        public function __construct()
        {
            parent::__construct('posts');
        }
        public function getPostData($post_id)
        {
            return $this->getOneRow($post_id);
        }
        public function getSorted($filter = [], $order = 'ASC', $by = 'id', $min = 0, $max = 100, $minPrice = 0, $maxPrice = null)
        {
            $tablename = 'posts';
            $query = "SELECT * FROM " . $tablename . " WHERE ";
            foreach ($filter as $key => $value) {
                if ($value == null) {
                    $query .= "$key IS NULL AND ";
                } else {
                    $query .= "$key = '$value' AND ";
                }
            }

            // varDump($query);

            if ($maxPrice != null) {
                $query .= "$tablename.price >= $minPrice AND $tablename.price <=$maxPrice";
            } else {
                $query = mb_substr($query, 0, mb_strlen($query) - 4);
            }
            $query .= " ORDER BY $by $order LIMIT $min, $max";
            // varDump($minPrice);
            // varDump($maxPrice);
            // varDump($query);
            return $this->executeQuery($query);
        }
    }
}
