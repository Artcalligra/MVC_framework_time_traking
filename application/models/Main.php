<?php

namespace application\models;

use application\core\Model;

class Main extends Model
{
    public function getNews(){
        $result = $this->db->row('SELECT title,description FROM news');
        return $result;
    }

    public function getUserId($user_id)
    {
        $result = $this->db->row('SELECT * FROM users WHERE id="' . $user_id . '"');
        return $result;
    }
}
