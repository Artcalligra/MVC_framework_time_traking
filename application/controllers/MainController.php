<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{
    public function indexAction()
    {

        if (isset($_SESSION['user_id'])) {

            $userTime = null;
            $result_user = $this->model->getUserId($_SESSION['user_id']);

            // debug($check_user);
            /* $add_user = $this->model->addUserInTime($_SESSION['user_id']);
            $status = $this->model->getStatus($_SESSION['user_id']); */
            //debug($status);
            //$date = $db->column('SELECT name FROM users WHERE id = :id', $params);
            //debug($date)

            // $current_time = date("H:i:s", time());
            $current_time = date("H:i:s", time());
            $date = date("d:m:Y", time());
            $status = "не работаю";
            $work_time = "00:00:00";
            $pause_time = "00:00:00";

            $check_user = $this->model->checkUser($_SESSION['user_id'], $date);
            if (!empty($check_user)) {
                $status = $check_user[0]['status'];
                $work_time = $check_user[0]['total_worked'];
                $pause_time = $check_user[0]['total_pause'];
            }

            $result = $this->model->getNews();
            $vars = [
                'news' => $result,
                'user' => $result_user[0],
                'current_time' => $current_time,
                'status' => $status,
                'work_time' => $work_time,
                'pause_time' => $pause_time,
            ];
            $this->view->render('главная страница', $vars);
        } else {
            $this->view->redirect('/account/login');
        }

    }

/*     public function apiAction(){

        $this->view->layout = 'default';

        $current_time = time();
        $date = date("d:m:Y", time());

        if (isset($_SESSION['user_id'])) {
            $check_user = $this->model->checkUser($_SESSION['user_id'], $date);
            debug($check_user);
            if (empty($check_user)) {
               // debug('none');
                $add_user = $this->model->addUser($_SESSION['user_id'], $date, $current_time);
            } else {
               // debug('have');
                if (isset($_POST['status'])) {

                    switch ($_POST['status']) {
                        case "работаю":
                            /* $check_user = $this->model->checkUser($_SESSION['user_id'], $date);
                            if (empty($check_user)) {
                            $add_user = $this->model->addUser($_SESSION['user_id'], $date, $current_time);
                            }  else {
                            $status_worker = $this->model->statusWorker($_SESSION['user_id'], $date, $current_time);
                            // }

                            break;
                        case "перерыв":
                            $check_user = $this->model->checkUser($_SESSION['user_id'], $date);
                            $total_work = $current_time - $check_user[0]['buffer_start'];
                            $add_pause = $this->model->addPause($_SESSION['user_id'], $date, $current_time, $total_work);

                            break;
                        case "закончить перерыв":
                            $check_user = $this->model->checkUser($_SESSION['user_id'], $date);
                            $total_pause = $current_time - $check_user[0]['buffer_pause'];
                            //debug($total_pause);
                            $continue_work = $this->model->continueWork($_SESSION['user_id'], $date, $current_time, $total_pause);
                            //debug($continue_work);
                            break;
                        case 'день закончен':
                            $check_user = $this->model->checkUser($_SESSION['user_id'], $date);
                            $total_work = $current_time - $check_user[0]['buffer_start'];
                            $end_day = $this->model->endDay($_SESSION['user_id'], $date, $current_time, $total_work);
                            break;
                    }

                    $check_user = $this->model->checkUser($_SESSION['user_id'], $date);
                    $this->view->message($check_user[0]);
                }
            }
        }


    } */

}
