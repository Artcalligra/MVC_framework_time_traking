<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{
    public function indexAction()
    {

        if (isset($_SESSION['user_id'])) {

            $result_user = $this->model->getUserId($_SESSION['user_id']);
            
            // debug($check_user);
            /* $add_user = $this->model->addUserInTime($_SESSION['user_id']);
            $status = $this->model->getStatus($_SESSION['user_id']); */
            //debug($status);
            //$date = $db->column('SELECT name FROM users WHERE id = :id', $params);
            //debug($date)

            $current_time = date("H:i:s", time());
            $date = date("d:m:Y", time());
            $status = "dont work";
            
            $check_user = $this->model->checkUser($_SESSION['user_id'],$date);
            if (!empty($check_user)){
                $userTime = $check_user;
            }

            $result = $this->model->getNews();
            $vars = [
                'news' => $result,
                'user' => $result_user[0],
                'current_time' => $current_time,
                'userTime'=>$userTime,
            ];
            $this->view->render('главная страница', $vars);
        } else {
            $this->view->redirect('/account/login');
        }

    }

}
