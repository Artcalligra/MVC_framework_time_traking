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
            date_default_timezone_set("Europe/Minsk");
            $current_time = date("H:i:s", time());
            $full_date = date("d:m:Y", time());
            $date = str_replace(":", "", $full_date);

            $status = "не работаю";
            $work_time = 0;
            $pause_time = 0;
            $user_img = "public/images/default_user.jpg";
            $rang = $_SESSION['rang'];

            $result_user = $this->model->getUserId($_SESSION['user_id']);
            if ($result_user) {
                if(!empty($result_user[0]['image'])){
                   $user_img = $result_user[0]['image']; 
                }                
            }

            if ($check_user_by_id = $this->model->checkUserByIdLast($_SESSION['user_id'])) {
                //debug($check_user_by_id[0]['date']);
                if ($date != $check_user_by_id[0]['date'] && $check_user_by_id[0]['status'] != 'день завершён') {
                    $status = $check_user_by_id[0]['status'];
                    $work_time = $check_user_by_id[0]['total_worked'];
                    $pause_time = $check_user_by_id[0]['total_pause'];
                } else {
                    $status = "не работаю";
                }
            } else {
                $status = "не работаю"; 
            }

            $check_user = $this->model->checkUser($_SESSION['user_id'], $date);
            if (!empty($check_user)) {
                $status = $check_user[0]['status'];
                $work_time = $check_user[0]['total_worked'];
                $pause_time = $check_user[0]['total_pause'];
                //if (!empty($result_user[0]['image'])) {
                // $user_img = $result_user[0]['image'];
                // }

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
        $default_value += [
            'news' => $result,
        ];
        $this->view->render('главная страница', $default_value);
    }

    public function time_trackingAction()
    {
        if (isset($_GET['user'])) {
            if ($_GET['user'] == 'getUserTime') {
                if (!empty($_GET['selectedUser'])) {
                    $user_id = $_GET['selectedUser'];
                } else {
                    $user_id = $_SESSION['user_id'];
                }
                $check_user = $this->model->checkUserById($user_id);
                $get_hours = $this->model->getHours();
                // $this->view->message($check_user);
                $this->view->duomessage($check_user, $get_hours);
            }

        }

        if (isset($_POST['user'])) {
            if ($_POST['user'] == 'editTime') {
                $date = $_POST['date'];
                $check_user = $this->model->checkUser($_SESSION['user_id'], $date);
                $start_time = $check_user[0]['start'];
                $end_time = $check_user[0]['end'];
                $pause_time = $check_user[0]['total_pause'];

                $dateday = date("U", mktime(0, 0, 0, substr($date, 2, 2), substr($date, 0, 2), substr($date, 4, 8)));
                // debug($dateday);
                if (!empty($_POST['editStart'])) {
                    $edit_hours = substr($_POST['editStart'], 0, 2);
                    $edit_minutes = ($edit_hours * 60) + substr($_POST['editStart'], 3, 2);
                    $start_time = $dateday + ($edit_minutes * 60);
                }
                if (!empty($_POST['editEnd'])) {
                    $edit_hours = substr($_POST['editEnd'], 0, 2);
                    $edit_minutes = ($edit_hours * 60) + substr($_POST['editEnd'], 3, 2);
                    $end_time = $dateday + ($edit_minutes * 60);
                }
                if (!empty($_POST['editPause'])) {
                    $edit_hours = substr($_POST['editPause'], 0, 2);
                    $pause_time = (($edit_hours * 60) + substr($_POST['editPause'], 3, 2)) * 60;
                }
                $edit_time = $this->model->editTime($_SESSION['user_id'], $date, $start_time, $pause_time, $end_time);
                //debug($start_time. " ". $end_time. " ".$pause_time);
            }
        }

        $default_value = $this->default_date();
        $result_user = $this->model->getUserId($_SESSION['user_id']);
        $get_all_users = $this->model->getAllUsers();
        $default_value += [
            'user_salary' => $result_user[0]['salary'],
            'all_users' => $get_all_users,
        ];
        $this->view->render('страница учёта времени', $default_value);
    }

    public function statisticAction()
    {
        $default_value = $this->default_date();
        $this->view->render('страница статистики', $default_value);
    }

    public function usersAction()
    {
        if ($_SESSION['rang'] == 'admin') {
            $default_value = $this->default_date();
            $get_all_users = $this->model->getAllUsers();
            $default_value += [
                'all_users' => $get_all_users,
            ];
            $this->view->render('страница пользователей', $default_value);
        } else {
            View::errorCode(404);
        }

    }

    public function month_hoursAction()
    {
        $default_value = $this->default_date();
        if ($_SESSION['rang'] == 'admin') {
            if (!empty($_POST)) {
                if ((int) $_POST['month'] < 10) {
                    $month = "0" . $_POST['month'];
                    // debug($month.$_POST['year']);
                    $check_date = $this->model->checkDate($month . $_POST['year']);
                    if ($check_date) {
                        $default_value += [
                            'message' => 'На введённую дату уже есть данные',
                        ];
                    } else {
                        $add_month_hours = $this->model->addMonthHours($month . $_POST['year'], $_POST['norm']);
                        // if($add_month_hours){
                        $this->view->redirect('/month_hours');
                        // }
                    }
                }

            }

            if (!empty($_GET['norm'])) {
                if (!empty($_GET['newNorm'])) {
                    $edit_norm = $this->model->editNorm($_GET['date'], $_GET['newNorm']);
                }

            }

            $get_month_hours = $this->model->monthHours();
            $default_value += [
                'month_hours' => $get_month_hours,
            ];
            $this->view->render('страница норм часов', $default_value);
        } else {
            View::errorCode(404);
        }

    }

    public function profileAction()
    {
        $default_value = $this->default_date();
        if (isset($_GET)) {
            if (ctype_digit($_GET['id'])) {
                $result_user = $this->model->getUserId($_GET['id']);
                if ($result_user) {
                    $default_value += [
                        'user' => $result_user[0],
                    ];
                } else {
                    View::errorCode(404);
                }
            } else {
                View::errorCode(404);
            }
        } else {
            View::errorCode(404);
        }

        if (isset($_POST['salary'])) {
            $update_user = $this->model->updateUserSalary($_POST['id'], $_POST['salary']);
            $this->view->redirect('/profile?id=' . $_POST['id']);
        }

        $this->view->render('страница профиля', $default_value);
    }
    public function profile_editAction()
    {
        $default_value = $this->default_date();
        if (isset($_GET)) {
            if (ctype_digit($_GET['id'])) {
                if ($_GET['id'] == $_SESSION['user_id'] || ($_SESSION['rang'] == 'admin')) {
                    $result_user = $this->model->getUserId($_GET['id']);
                    $user_name = strip_tags($result_user[0]['user_name']);
                    $phone = $result_user[0]['phone'];
                    $email = $result_user[0]['email'];
                    $password = $result_user[0]['password'];
                    if ($result_user) {
                        //debug($result_user);
                        $default_value += [
                            'user' => $result_user[0],
                        ];
                    } else {
                        View::errorCode(404);
                    }
                    if (!empty($_POST)) {
                        $file_name = null;
                        $user_name = strip_tags($_POST['user_name']);
                        $phone = $_POST['phone'];
                        $email = $_POST['email'];
                        $old_password = $_POST['old_password'];
                        $new_password = $_POST['new_password'];
                        $confirm_password = $_POST['confirm_password'];

                        if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                            $uploaddir = $_SERVER["DOCUMENT_ROOT"] . '/public/images/user_images/';
                            $file_name = '/public/images/user_images/' . '_' . time() . $_FILES['image']['name'];
                            $uploadfile = $uploaddir . basename($file_name);
                            move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);
                        }
                        if (!empty($email)) {
                            if (!preg_match('^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$^', $email)) {
                                $default_value += [
                                    'message' => 'Неверный email',
                                ];
                            }
                        }

                        if (!empty($old_password)) {
                            if ($result_user[0]['password'] == md5($old_password)) {
                                if ($new_password == $confirm_password) {
                                    $password = $new_password;
                                    if (preg_match('^((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[a-z]).{5,}$^', $password)) {
                                        $update_user = $this->model->updateProfile($_GET['id'], $user_name, $file_name, $email, $phone, md5($password));
                                        if ($update_user) {
                                            $this->view->redirect('profile_edit?id=' . $_GET['id']);
                                        }
                                    }
                                } else {
                                    $default_value += [
                                        'message' => 'Неверный пароль',
                                    ];
                                }
                            } else {
                                $default_value += [
                                    'message' => 'Неверный пароль',
                                ];
                            }
                        } else {
                            $update_user = $this->model->updateProfile($_GET['id'], $user_name, $file_name, $email, $phone, $password);
                            if ($update_user) {
                                $this->view->redirect('profile_edit?id=' . $_GET['id']);
                            }
                        }
                    }
                } else {
                    View::errorCode(404);
                }
            } else {
                View::errorCode(404);
            }
        } else {
            View::errorCode(404);
        }

        $this->view->render('страница профиля', $default_value);
    }

    public function news_createAction()
    {
        if (!empty($_POST)) {
            $file_name = null;
            if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                $uploaddir = $_SERVER["DOCUMENT_ROOT"] . '/public/images/user_images/';
                $file_name = '/public/images/user_images/' . $_FILES['image']['name'] . '_' . time();
                $uploadfile = $uploaddir . basename($file_name);
                move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);
            }

            $result_news = $this->model->addNews($_SESSION['user_id'], strip_tags($_POST['title']), $file_name, strip_tags($_POST['description'], '<p><br><b></b><i></i>'));

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

    public function newsAction()
    {
        $default_value = $this->default_date();
        if (isset($_GET)) {
            // debug($_GET);
            if (ctype_digit($_GET['id'])) {
                $result = $this->model->getNewsById($_GET['id']);
                if ($result) {
                    $default_value += [
                        'news' => $result,
                    ];
                } else {
                    View::errorCode(404);
                }
                $this->view->render('главная страница', $default_value);
            } else {
                echo 'no int';
            };

        } else {
            $this->view->render('страница новости', $default_value);
        }

    }

    public function news_editAction()
    {
        $default_value = $this->default_date();
        if (isset($_GET)) {
            if (ctype_digit($_GET['id'])) {
                $result = $this->model->getNewsById($_GET['id']);
                //debug($result);
                if ($result) {
                    $default_value += [
                        'news' => $result[0],
                    ];
                } else {
                    View::errorCode(404);
                }
                if (!empty($_POST)) {
                    $file_name = null;
                    // debug($_POST);
                    if (isset($_POST['delete_image'])) {
                        //debug($_POST['delete_image']);
                        if ($_POST['delete_image'] == 'on') {
                            $file_name = 1;
                        }
                    }

                    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                        $uploaddir = $_SERVER["DOCUMENT_ROOT"] . '/public/images/user_images/';
                        $file_name = '/public/images/user_images/' . '_' . time() . $_FILES['image']['name'];
                        $uploadfile = $uploaddir . basename($file_name);
                        move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);
                    }
                    $update_news = $this->model->updateNews($_GET['id'], strip_tags($_POST['title']), $file_name, strip_tags($_POST['description'], '<p><br><b></b><i></i>'));
                    //debug($update_news);
                    if ($update_news) {
                        $this->view->redirect('/news?id=' . $_GET['id']);
                    }
                }
                $this->view->render('редактирование новости', $default_value);
            }
        } else {
            $this->view->render('редактирование новости', $default_value);
        }
    }

}
