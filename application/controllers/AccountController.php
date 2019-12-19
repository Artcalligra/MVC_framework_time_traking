<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller
{

    public function loginAction()
    {
        $this->view->layout = 'login_register';

        // $this->view->path = 'test/login';
        // $this->view->redirect('/');

        if (!empty($_POST)) {
            $user_name = $_POST['user_name'];
            $password = md5($_POST['password']);
            $result = $this->model->getUser($user_name, $password);
           // debug($result[0]['id']);
            if ($result) {
                $_SESSION['user_id'] = $result[0]['id'];
                $_SESSION['rang'] = $result[0]['rang'];
                $this->view->redirect('/');
            } else {

                $vars = [
                    'message' => 'Error login or password.',
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
        $this->view->layout = 'login_register';
        
        if (!empty($_POST)) {
            $user_name = $_POST['user_name'];
            $password = $_POST['password'];
            $password_confirmation = $_POST['password_confirm'];
            if ($password == $password_confirmation) {
                if (preg_match('^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$^', $user_name) && preg_match('^((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[a-z]).{5,}$^', $password)) {
                    $result = $this->model->checkUser($user_name);
                    if ($result) {
                        $vars = [
                            'message' => 'A user with the same name already exists.',
                        ];
                        $this->view->render('страница регистрации', $vars);
                    } else {
                        $result = $this->model->registerUser($user_name, md5($password));
                        // debug($result);
                        $this->view->redirect('/account/login');
                    }
                } else {
                    $vars = [
                        'message' => 'Invalid username or password',
                    ];
                    $this->view->render('страница регистрации', $vars);
                }

            } else {
                $vars = [
                    'message' => 'You entered two different passwords. Please try again.',
                ];
                $this->view->render('страница регистрации', $vars);
            }
        } else {

            $this->view->render('страница регистрации');
        }
    }
}
