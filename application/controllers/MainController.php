<?php

namespace application\controllers;

use application\core\Controller;
use application\core\View;

class MainController extends Controller
{

    public $default_value;

    public function __construct($route)
    {

        $this->route = $route;
        if (!$this->checkAcl()) {
            View::errorCode(403);
        }

        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);

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

            $this->default_value = [
                'user_name' => $result_user[0]['user_name'],
                'user_img' => $user_img,
                'current_time' => $current_time,
                'status' => $status,
                'work_time' => $work_time,
                'pause_time' => $pause_time,
                'rang' => $rang,
            ];
        } else {
            $this->view->redirect('/account/login');
        }

    }

    public function indexAction()
    {

        /* if (isset($_SESSION['rang'])) {
        if ($_SESSION['rang'] == 'admin') {
        $this->view->render_content('main/time_tracking');
        }
        } */

        /*if (isset($_SESSION['user_id'])) {

        $userTime = null;
        $result_user = $this->model->getUserId($_SESSION['user_id']); */

        // debug($check_user);
        /* $add_user = $this->model->addUserInTime($_SESSION['user_id']);
        $status = $this->model->getStatus($_SESSION['user_id']); */
        //debug($status);
        //$date = $db->column('SELECT name FROM users WHERE id = :id', $params);
        //debug($date)

        // $current_time = date("H:i:s", time());
        /*  $current_time = date("H:i:s", time());
        $date = date("d:m:Y", time());
        $status = "не работаю";
        $work_time = 0;
        $pause_time = 0;

        $check_user = $this->model->checkUser($_SESSION['user_id'], $date);
        if (!empty($check_user)) {
        $status = $check_user[0]['status'];
        $work_time = $check_user[0]['total_worked'];
        $pause_time = $check_user[0]['total_pause'];
        } */

        $result = $this->model->getNews();
        $default_value = $this->default_value;
        $vars = $default_value += [
            'news' => $result,
            /*  'user' => $result_user[0],
        'current_time' => $current_time,
        'status' => $status,
        'work_time' => $work_time,
        'pause_time' => $pause_time, */
        ];
        $this->view->render('главная страница', $vars);

        /*  } else {
    $this->view->redirect('/account/login');
    } */

    }

    /* public function default_date()
    {
    $userTime = null;
    $result_user = $this->model->getUserId($_SESSION['user_id']);
    $current_time = date("H:i:s", time());
    $date = date("d:m:Y", time());
    $status = "не работаю";
    $work_time = 0;
    $pause_time = 0;

    $check_user = $this->model->checkUser($_SESSION['user_id'], $date);
    if (!empty($check_user)) {
    $status = $check_user[0]['status'];
    $work_time = $check_user[0]['total_worked'];
    $pause_time = $check_user[0]['total_pause'];
    }

    $default_value = [
    'user' => $result_user[0],
    'current_time' => $current_time,
    'status' => $status,
    'work_time' => $work_time,
    'pause_time' => $pause_time,
    ];

    return $default_value;
    } */

    public function time_trackingAction()
    {

        /*if (isset($_SESSION['user_id'])) {

        $userTime = null;
        $result_user = $this->model->getUserId($_SESSION['user_id']);
        $current_time = date("H:i:s", time());
        $date = date("d:m:Y", time());
        $status = "не работаю";
        $work_time = 0;
        $pause_time = 0;

        $check_user = $this->model->checkUser($_SESSION['user_id'], $date);
        if (!empty($check_user)) {
        $status = $check_user[0]['status'];
        $work_time = $check_user[0]['total_worked'];
        $pause_time = $check_user[0]['total_pause'];
        }

        $result = $this->model->getNews();
        $vars = [
        'user' => $result_user[0],
        'current_time' => $current_time,
        'status' => $status,
        'work_time' => $work_time,
        'pause_time' => $pause_time,
        ]; */
        /* $varss  = default_date();
        debug($varss); */
        $default_value = $this->default_value;
        /* $default_value = default_date();
        debug($default_value); */
        $this->view->render('страница учёта времени', $default_value);

        /*  } else {
    $this->view->redirect('/account/login');
    } */
    }

    public function statisticAction()
    {
        $default_value = $this->default_value;
        $this->view->render('страница статистики', $default_value);
    }

    public function profileAction()
    {
        $default_value = $this->default_value;
        $this->view->render('страница профиля', $default_value);
    }

}
