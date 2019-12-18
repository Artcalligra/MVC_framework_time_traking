<?php

namespace application\controllers;

use application\core\Controller;

class ApiController extends Controller
{
    public function timeAction()
    {
        //$user_id = $_SESSION['user_id'];
        // $adduser = $this->model->addUser($user_id);
        // $status = $this->model->getStatus($user_id);
        // debug($status);
        $current_time = time();
        $date = date("d:m:Y", time());

        /* if (isset($_SESSION['user_id'])) {
        $check_user = $this->model->checkUser($_SESSION['user_id'], $date);
        //debug($check_user);
        if (empty($check_user)) {
        // debug('none');
        $add_user = $this->model->addUser($_SESSION['user_id'], $date, $current_time);
        } else { */
        // debug('have');
        if (isset($_POST['status'])) {

            switch ($_POST['status']) {
                case "работаю":
                    $check_user = $this->model->checkUser($_SESSION['user_id'], $date);
                    if (empty($check_user)) {
                        $add_user = $this->model->addUser($_SESSION['user_id'], $date, $current_time);
                    } else {
                        $status_worker = $this->model->statusWorker($_SESSION['user_id'], $date, $current_time);
                    }

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
                case 'день завершён':
                    $check_user = $this->model->checkUser($_SESSION['user_id'], $date);
                    $total_work = $current_time - $check_user[0]['buffer_start'];
                    $end_day = $this->model->endDay($_SESSION['user_id'], $date, $current_time, $total_work);
                    break;
            }

            $check_user = $this->model->checkUser($_SESSION['user_id'], $date);
            $this->view->message($check_user[0]);
        }
    }

    /* else {
echo ('error');
} */

}
