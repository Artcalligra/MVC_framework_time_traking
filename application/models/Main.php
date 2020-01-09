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

    public function getNewsById($id)
    {
        $result = $this->db->row('SELECT * FROM news WHERE id = "' . $id . '"');
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

    public function checkUserById($user_id)
    {
        $db = new Db;
        $params = [
            'user_id' => $user_id,
        ];

        $date = $this->db->row('SELECT * FROM times WHERE user_id = :user_id', $params);
        return $date;
    }

    public function getHours()
    {
        $date = $this->db->row('SELECT * FROM month_hours');
        return $date;
    }
    public function getAllUsers()
    {
        $date = $this->db->row('SELECT * FROM users');
        return $date;
    }

    public function checkUserByIdLast($user_id)
    {
        $db = new Db;
        $params = [
            'user_id' => $user_id,
        ];

        $date = $this->db->row('SELECT * FROM times WHERE user_id = :user_id ORDER BY id DESC LIMIT 1', $params);
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

    public function updateNews($id, $title, $image, $description)
    {
        $db = new Db;
        //debug($image);
        if (!empty($image)) {
            if ($image == 1) {
                //debug('1');
                $params = [
                    'id' => $id,
                    'title' => $title,
                    'image' => null,
                    'description' => $description,
                ];

            } else {
                // debug('0') ;
                $params = [
                    'id' => $id,
                    'title' => $title,
                    'image' => $image,
                    'description' => $description,
                ];
            }

            $date = $db->query('UPDATE news SET title = :title, image = :image, description = :description WHERE id = :id', $params);
        } else {
            $params = [
                'id' => $id,
                'title' => $title,
                'description' => $description,
            ];

            $date = $db->query('UPDATE news SET title = :title, description = :description WHERE id = :id', $params);

        }

        return $date;

    }

    public function updateProfile($id, $user_name, $image, $email, $phone, $password)
    {
        $db = new Db;
        //debug($image);
        if (!empty($image)) {
            // echo '+';
            $params = [
                'id' => $id,
                'user_name' => $user_name,
                'image' => $image,
                'email' => $email,
                'phone' => $phone,
                'password' => $password,
            ];

            $date = $db->query('UPDATE users SET user_name = :user_name, image = :image, email = :email, phone = :phone, password = :password WHERE id = :id', $params);
        } else {
            // echo '-';
            $params = [
                'id' => $id,
                'user_name' => $user_name,
                'email' => $email,
                'phone' => $phone,
                'password' => $password,
            ];

            $date = $db->query('UPDATE users SET user_name = :user_name, email = :email, phone = :phone, password = :password WHERE id = :id', $params);

        }

        return $date;

    }

    public function editTime($user_id, $date, $start_time, $pause, $end_time)
    {
        $total_worked = $end_time - $start_time - $pause;
        $db = new Db;
        $params = [
            'user_id' => $user_id,
            'date' => $date,
            'start' => $start_time,
            'total_pause' => $pause,
            'end' => $end_time,
            'total_worked' => $total_worked,

        ];

        $date = $this->db->row('UPDATE times SET start = :start, total_pause = :total_pause, end = :end, total_worked = :total_worked  WHERE user_id = :user_id AND date = :date', $params);
        return $date;
    }

    public function updateUserSalary($user_id, $salary)
    {
        $db = new Db;
        $params = [
            'user_id' => $user_id,
            'salary' => $salary,

        ];

        $date = $this->db->row('UPDATE users SET salary = :salary WHERE id = :user_id', $params);
        return $date;
    }

    public function monthHours()
    {

        $date = $this->db->row('SELECT * FROM month_hours');
        return $date;
    }

    public function checkDate($date)
    {
        $db = new Db;
        $params = [
            'date' => $date,
        ];

        $date = $this->db->row('SELECT * FROM month_hours WHERE date = :date', $params);
        return $date;
    }

    public function addMonthHours($date, $hours)
    {
        $db = new Db;
        $params = [
            'date' => $date,
            'hours' => $hours,
        ];

        $date = $this->db->row('INSERT INTO month_hours SET date = :date, hours = :hours', $params);
        return $date;
    }

    public function editNorm($date, $hours)
    {
        $db = new Db;
        $params = [
            'date' => $date,
            'hours' => $hours,
        ];

        $date = $this->db->row('UPDATE month_hours SET hours = :hours WHERE date = :date', $params);
        return $date;
    }

}
