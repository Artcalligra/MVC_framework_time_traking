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
            $user_name = strip_tags($_POST['user_name']);
            $password = md5($_POST['password']);
            $result = $this->model->getUser($user_name, $password);
            // debug($result[0]['id']);
            if ($result) {
                $_SESSION['user_id'] = $result[0]['id'];
                $_SESSION['rang'] = $result[0]['rang'];
                $this->view->redirect('/');
            } else {

                $vars = [
                    'message' => 'Ошибка логина или пароля.',
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
            $user_name = strip_tags($_POST['user_name']);
            $password = $_POST['password'];
            $email = $_POST['email'];
            $password_confirmation = $_POST['password_confirm'];
            $check_email = $this->model->checkEmail($email);
            if (!empty($check_email)) {
                $vars = [
                    'message' => 'Пользователь с таким email уже существует.',
                ];
                $this->view->render('страница регистрации', $vars);
            } else {

                if ($password == $password_confirmation) {
                    if (preg_match('^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$^', $user_name) && preg_match('^((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[a-z]).{5,}$^', $password)) {
                        $check_user = $this->model->checkUser($user_name);
                        if ($check_user) {
                            $vars = [
                                'message' => 'Пользователь с таким именем уже существует.',
                            ];
                            $this->view->render('страница регистрации', $vars);
                        } else {
                            $register_user = $this->model->registerUser($user_name, md5($password), $email);
                            // debug($result);
                            $this->view->redirect('/account/login');
                        }
                    } else {
                        $vars = [
                            'message' => 'Неверный формат имени или пароля.',
                        ];
                        $this->view->render('страница регистрации', $vars);
                    }

                } else {
                    $vars = [
                        'message' => 'Вы ввели разные пароли. Введите ещё раз.',
                    ];
                    $this->view->render('страница регистрации', $vars);
                }
            }
        } else {

            $this->view->render('страница регистрации');
        }
    }

    public function recoveryAction()
    {
        $this->view->layout = 'login_register';

        if (!empty($_POST)) {
            $check_email = $this->model->checkEmail($_POST['email']);
            if ($check_email) {
                $random_number = substr(md5(rand(0, 1000)), 0, 6);
                // debug($random_number);
                $to = $check_email[0]['email'];

                $subject = "Восстановление пароля";

                $message = ' <p>Новый пароль</p> <b>' . $random_number . ' </b> ';

                $headers = "Content-type: text/html; charset=utf-8 \r\n";
                $headers .= "From: TestSendMail <from@example.com>\r\n";
                $headers .= "Reply-To: " . $to;

                if (mail($to, $subject, $message, $headers)) {
                    $recovery_pass = $this->model->recoveryPass($to, md5($random_number));
                    $vars = [
                        'message' => 'Сообщение отправлено',
                    ];
                    $this->view->render('страница восстановления', $vars);
                }
            } else {

                $vars = [
                    'message' => 'Неверно введён email.',
                ];
                $this->view->render('страница восстановления', $vars);
            }

        } else {

            $this->view->render('страница восстановления');
        }
    }

}
