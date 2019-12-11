<?php

namespace application\models;

use application\core\Model;

class Account extends Model
{
    public function getUserId($user_name, $password)
    {
        $result = $this->db->column('SELECT id FROM users WHERE user_name="' . $user_name . '" AND password=' . (int)$password);
        return $result;
    }
}
