<?php

namespace application\models;

use application\core\Model;
use application\lib\Db;

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

    public function checkUser($user_id, $date)
    {

        $db = new Db;
        $params = [
            'user_id' => $user_id,
            'date' => $date,
        ];

        $date = $this->db->row('SELECT * FROM times WHERE user_id = :user_id  AND date = :date', $params);
        return $date;
    }

}
