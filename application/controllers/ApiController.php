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

        if (isset($_POST['status'])) {

            switch ($_POST['status']) {
                case "работаю":
                   // echo ('i равно 0');
                    $check_user = $this->model->checkUser($_SESSION['user_id'],$date);
                    //debug($check_user);
                    if (empty($check_user)) {
                        //debug($check_user);
                        $add_user = $this->model->addUser($_SESSION['user_id'], $date, $current_time);
                       
                    } else {
                        $status_work = $this->model->statusWork($_SESSION['user_id'], $date, $current_time);
                    }
                    break;
                case "перерыв":
                    echo "i равно 1";
                    break;                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
                case 'конец рабочего дня':
                    echo "i равно 2";
                    break;
            }

           // debug($_POST);
            //$result = $this->model->addDateAndStart($user_id, $current_date, $start_time);
            /*  $status = $this->model->getStatus($user_id);
        debug($status); */
        } else {
            echo ('error');
        }
    }

}
