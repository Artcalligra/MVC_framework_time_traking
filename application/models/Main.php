<?php

namespace application\models;

use application\core\Model;
use application\lib\Db;

class Main extends Model
{
    public function getNews()
    {
        $result = $this->db->row('SELECT * FROM news ORDER BY id DESC');
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

    public function addUser($user_id, $date, $start)
    {
        $db = new Db;
        $params = [
            'user_id' => $user_id,
            'date' => $date,
            'start' => $start,
            'buffer_start' => $start,
            'status' => "dont work",
        ];

        $date = $db->query('INSERT INTO times SET user_id = :user_id, date = :date, start = :start, buffer_start = :buffer_start, status = :status', $params);
        return $date;

    }

    public function statusWorker($user_id, $date, $start)
    {

        $db = new Db;
        $params = [
            'status' => "work",
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
            'status' => "pause",
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
            'status' => "work",
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
            'status' => "end day",
            'user_id' => $user_id,
            'date' => $date,
            'total_worked' => $total_work,
        ];

        $date = $this->db->row('UPDATE times SET status = :status, total_worked = total_worked + :total_worked WHERE user_id = :user_id AND date = :date', $params);
        return $date;
    }

    public function addNews($user_id, $title, $image, $description)
    {
        $db = new Db;
        //debug($image);
        if (!empty($image)) {
            echo '+';
            $params = [
                'user_id' => $user_id,
                'title' => $title,
                'image' => $image,
                'description' => $description,
            ];

            $date = $db->query('INSERT INTO news SET user_id = :user_id, title = :title, image = :image, description = :description', $params);
        } else {
            echo '-';
            $params = [
                'user_id' => $user_id,
                'title' => $title,
                'description' => $description,
            ];

            $date = $db->query('INSERT INTO news SET user_id = :user_id, title = :title,  description = :description', $params);
        }

        return $date;

    }

}
