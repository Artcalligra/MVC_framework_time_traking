<?php

namespace application\controllers;

use application\core\Controller;

class ApiController extends Controller
{
    public function timeAction()
    {
        $current_time = time();
        $full_date = date("d:m:Y", time());
        $date = str_replace(":", "", $full_date);
        // debug($date);
        /* $today = getdate();
        $d = $today['mday'] - 1;
        $m = $today['mon'];
        $y = $today['year'];
        $yesterday_day = $d . ":" . $m . ":" . $y;
        debug($yesterday_day); */

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
                   
                    if (!$check_user) {
                        $add_user = $this->model->addUser($_SESSION['user_id'], $date, $current_time);
                    } else {
                        $status_worker = $this->model->statusWorker($_SESSION['user_id'], $date, $current_time);
                    }
                    break;
                case "перерыв":
                    $check_user_by_id = $this->model->checkUserByIdLast($_SESSION['user_id']);
                    if ($date != $check_user_by_id[0]['date']) {
                        $check_user = $this->model->checkUser($_SESSION['user_id'], $check_user_by_id[0]['date']);
                        $total_work = $current_time - $check_user[0]['buffer_start'];
                        $add_pause = $this->model->addPause($_SESSION['user_id'], $check_user_by_id[0]['date'], $current_time, $total_work);
                    } else {
                        $check_user = $this->model->checkUser($_SESSION['user_id'], $date);
                        $total_work = $current_time - $check_user[0]['buffer_start'];
                        $add_pause = $this->model->addPause($_SESSION['user_id'], $date, $current_time, $total_work);
                    }
                    break;
                case "закончить перерыв":
                    $check_user_by_id = $this->model->checkUserByIdLast($_SESSION['user_id']);
                    if ($date != $check_user_by_id[0]['date']) {
                        $check_user = $this->model->checkUser($_SESSION['user_id'], $check_user_by_id[0]['date']);
                        $total_pause = $current_time - $check_user[0]['buffer_pause'];
                        $continue_work = $this->model->continueWork($_SESSION['user_id'], $check_user_by_id[0]['date'], $current_time, $total_pause);
                    } else {
                        $check_user = $this->model->checkUser($_SESSION['user_id'], $date);
                        $total_pause = $current_time - $check_user[0]['buffer_pause'];
                        $continue_work = $this->model->continueWork($_SESSION['user_id'], $date, $current_time, $total_pause);
                    }

                    break;
                case 'день завершён':
                    $check_user_by_id = $this->model->checkUserByIdLast($_SESSION['user_id']);
                    if ($date != $check_user_by_id[0]['date']) {
                        $check_user = $this->model->checkUser($_SESSION['user_id'], $check_user_by_id[0]['date']);
                        $total_work = $current_time - $check_user[0]['buffer_start'];
                        $end_day = $this->model->endDay($_SESSION['user_id'], $check_user_by_id[0]['date'], $current_time, $total_work);
                    } else {
                        $check_user = $this->model->checkUser($_SESSION['user_id'], $date);
                        $total_work = $current_time - $check_user[0]['buffer_start'];
                        $end_day = $this->model->endDay($_SESSION['user_id'], $date, $current_time, $total_work);
                    }

                    break;
            }
            /* $check_user_by_id = $this->model->checkUserByIdLast($_SESSION['user_id']);
            if ($date != $check_user_by_id[0]['date']) {
                $check_user = $this->model->checkUser($_SESSION['user_id'], $check_user_by_id[0]['date']);
                $this->view->message($check_user[0]);
            } else { */
                $check_user = $this->model->checkUser($_SESSION['user_id'], $date);
               // debug($check_user );
                $this->view->message($check_user[0]);
            //}

        }
    }

    /* else {
echo ('error');
} */

}
