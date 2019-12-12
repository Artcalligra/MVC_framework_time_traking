<?php

namespace application\models;

use application\core\Model;
use application\lib\Db;

class Account extends Model
{
    public function getUserId($user_name, $password)
    {
        $result = $this->db->column('SELECT id FROM users WHERE user_name="' . $user_name . '" AND password="' . $password . '"');
        return $result;
    }

    public function checkUser($user_name)
    {
        $result = $this->db->column('SELECT * FROM users WHERE user_name="' . $user_name . '"');
        return $result;
    }

    public function registerUser($user_name, $password)
    {
        $db = new Db;
        $params = [
            'user_name' => $user_name,
            'password' => $password,
        ];

        $date = $db->query('INSERT INTO users SET user_name = :user_name, password = :password, rang = "user" ', $params);
        return $date;
    }

}
