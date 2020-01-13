<?php

namespace application\models;

use application\core\Model;
use application\lib\Db;

class Account extends Model
{
    public function getUser($user_name, $password)
    {
        $db = new Db;
        $params = [
            'user_name' => $user_name,
            'password' => $password,
        ];
        $result = $this->db->row('SELECT * FROM users WHERE user_name=:user_name AND password=:password', $params);
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

    public function checkEmail($email)
    {
        $db = new Db;
        $params = [
            'email' => $email,
        ];

        $date = $this->db->row('SELECT * FROM users WHERE email=:email', $params);
        return $date;
    }

    public function recoveryPass($email, $pass)
    {
        $db = new Db;
        $params = [
            'email' => $email,
            'password' => $pass,
        ];

        $date = $db->query('UPDATE users SET password = :password WHERE email = :email', $params);
        return $date;
    }

}
