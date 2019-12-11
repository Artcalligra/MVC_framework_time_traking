<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Db;

class AccountController extends Controller
{

    public function loginAction()
    {
        $message = null;

        // $this->view->path = 'test/login';
        // $this->view->redirect('/');

        if (!empty($_POST)) {
            $user_name = $_POST['user_name'];
            $password = md5($_POST['password']);
            $result = $this->model->getUserId($user_name, $password);
            //debug($password);
            if ($result) {
                $this->view->redirect('/');
            } else {

                $vars = [
                    'message' => 'error login or password',
                ];
                $this->view->render('страница входа', $vars);
            }
        } else {
           /*  $vars = [
                'message' => '',
            ]; */
            $this->view->render('страница входа');
        }

    }

    public function registerAction()
    {
        $this->view->render('страница регистрации');
    }
}
