<?php

namespace application\models;

use application\core\Model;
use application\lib\Db;

class Api extends Model
{
    /* public function addDateAndStart($user_id, $date, $start)
    {
    $db = new Db;
    $params = [
    'user_id' =>$user_id,
    'date' => $date,
    'start' => $start,
    ];

    $date = $db->query('INSERT INTO times SET user_id =: user_id, date = :date, start = :start ', $params);
    return $date;
    } */

    /* public function addUserInTime($user_id)
    {
    $db = new Db;
    $params = [
    'user_id' =>$user_id,
    ];

    $date = $db->query('INSERT INTO times SET user_id =: user_id ', $params);
    return $date;
    } */

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

    public function addUser($user_id, $date, $start)
    {
        $db = new Db;
        $params = [
            'user_id' => $user_id,
            'date' => $date,
            'start' => $start,
            'buffer_start' => $start,
            'status' => "работаю",
        ];

        //debug($params);

        $date = $db->query('INSERT INTO times SET user_id = :user_id, date = :date, start = :start, buffer_start = :buffer_start, status = :status', $params);
        return $date;

    }

    public function statusWork($user_id, $date, $start)
    {

        $db = new Db;
        $params = [
            'status' => "работаю",
            'user_id' => $user_id,
            'date' => $date, 
            'buffer_start' => $start,           
        ];

        $date = $this->db->row('UPDATE times SET status = :status, buffer_start = :buffer_start WHERE user_id = :user_id AND date = :date', $params);
        return $date;
    }
}
