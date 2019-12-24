<?php

namespace application\models;

use application\core\Model;
use application\lib\Db;

class Account extends Model
{
    public function getUser($user_name, $password)
    {
        $result = $this->db->row('SELECT * FROM users WHERE user_name="' . $user_name . '" AND password="' . $password . '"');
        return $result;
    }

    public function checkUser($user_name)
    {
        $result = $this->db->column('SELECT * FROM users WHERE user_name="' . $user_name . '"');
        return $result;
    }

    public function registerUser($user_name, $password, $email)
    {
        $db = new Db;
        $params = [
            'user_name' => $user_name,
            'password' => $password,
            'email' => $email,
        ];

        $date = $db->query('INSERT INTO users SET user_name = :user_name, password = :password, email = :email, rang = "user" ', $params);
        return $date;
    }

}
