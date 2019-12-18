<?php

namespace application\models;

use application\core\Model;
use application\lib\Db;

class Api extends Model
{
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

        $date = $db->query('INSERT INTO times SET user_id = :user_id, date = :date, start = :start, buffer_start = :buffer_start, status = :status', $params);
        return $date;

    }

    public function statusWorker($user_id, $date, $start)
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

    public function addPause($user_id, $date, $current_time, $total_work)
    {

        $db = new Db;
        $params = [
            'status' => "перерыв",
            'user_id' => $user_id,
            'date' => $date,
            'buffer_pause' => $current_time,
            'total_worked' => $total_work,
        ];

        $date = $this->db->row('UPDATE times SET status = :status, total_worked = total_worked + :total_worked, buffer_pause = :buffer_pause  WHERE user_id = :user_id AND date = :date', $params);
        return $date; 
    }

    public function continueWork($user_id, $date, $current_time, $total_pause)
    {

        $db = new Db;
        $params = [
            'status' => "работаю",
            'user_id' => $user_id,
            'date' => $date,
            'buffer_start' => $current_time,
            'total_pause' => $total_pause,
        ];

        $date = $this->db->row('UPDATE times SET status = :status, total_pause = total_pause + :total_pause, buffer_start = :buffer_start  WHERE user_id = :user_id AND date = :date', $params);
        return $date; 
    }

    public function endDay($user_id, $date, $current_time, $total_work)
    {

        $db = new Db;
        $params = [
            'status' => "день завершён",
            'user_id' => $user_id,
            'date' => $date,
            'total_worked' => $total_work,
        ];

        $date = $this->db->row('UPDATE times SET status = :status, total_worked = total_worked + :total_worked WHERE user_id = :user_id AND date = :date', $params);
        return $date; 
    }

}
