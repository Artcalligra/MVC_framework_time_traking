<?php

namespace application\controllers;

use application\core\Controller;
use application\core\View;

class MainController extends Controller
{

    public $default_value;

    public function default_date()
    {
        if (isset($_SESSION['user_id'])) {
            $userTime = null;
            $result_user = $this->model->getUserId($_SESSION['user_id']);
            $current_time = date("H:i:s", time());
            $date = date("d:m:Y", time());
            $status = "не работаю";
            $work_time = 0;
            $pause_time = 0;
            $user_img = "public/images/default_user.jpg";
            $rang = "user";

            $check_user = $this->model->checkUser($_SESSION['user_id'], $date);
            if (!empty($check_user)) {
                $status = $check_user[0]['status'];
                $work_time = $check_user[0]['total_worked'];
                $pause_time = $check_user[0]['total_pause'];
                $user_img = $result_user[0]['image'];
                $rang = $result_user[0]['rang'];
            }

            $default_value = [
                'user_name' => $result_user[0]['user_name'],
                'user_img' => $user_img,
                'current_time' => $current_time,
                'status' => $status,
                'work_time' => $work_time,
                'pause_time' => $pause_time,
                'rang' => $rang,
            ];
            return $default_value;
        } else {
            $this->view->redirect('/account/login');
        }
    }

    public function indexAction()
    {
        $result = $this->model->getNews();
        $default_value = $this->default_date();
        $vars = $default_value += [
            'news' => $result,
        ];
        $this->view->render('главная страница', $vars);
    }

    public function time_trackingAction()
    {
        $default_value = $this->default_date();
        $this->view->render('страница учёта времени', $default_value);
    }

    public function statisticAction()
    {
        $default_value = $this->default_date();
        $this->view->render('страница статистики', $default_value);
    }

    public function profileAction()
    {
        $default_value = $this->default_date();
        $this->view->render('страница профиля', $default_value);
    }

    public function news_createAction()
    {
        if (!empty($_POST)) {
            $file_name = null;
            if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                $uploaddir = $_SERVER["DOCUMENT_ROOT"] . '/public/images/user_images/';
                $file_name = '/public/images/user_images/' . $_FILES['image']['name'];
                //debug($_FILES);
                $uploadfile = $uploaddir . basename($file_name);

                move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);
                // debug($_FILES['image']['name']);
                /* if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
            echo "Файл корректен и был успешно загружен.\n";
            } else {
            echo "Ошибка\n";
            } */
            }
            //$title =$_POST['title'];
            $result_news = $this->model->addNews($_SESSION['user_id'], $_POST['title'], $file_name, $_POST['description']);
            // debug($result_news);

            if ($result_news) {
                $this->view->redirect('/');
            } else {
                $default_value = $this->default_date();
                $default_value += [
                    'message' => 'Ошибка создания новости',
                ];
                $this->view->render('создание новости', $default_value);
            }
        }
        $default_value = $this->default_date();
        $this->view->render('создание новости', $default_value);
    }

}
