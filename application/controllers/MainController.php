<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Db;

class MainController extends Controller
{
    public function indexAction()
    {

        /* if(isset($_SESSION)){

        } */
        if (isset($_SESSION['user_id'])) {
            /* $vars = [
            'name' => 'Вася',
            'age' => 11,
            ]; */
            $db = new Db;

            //$form = 2;
            $params = [
                'id' => 2,
            ];
            $result_user = $this->model->getUserId($_SESSION['user_id']);
            //debug($result_user[0]);
            //$date = $db->column('SELECT name FROM users WHERE id = :id', $params);
            //debug($date);
            $result = $this->model->getNews();
            $vars = [
                'news' => $result,
                'user' => $result_user[0],
            ];
            //debug($result);
            $this->view->render('главная страница', $vars);
        } else {
            $this->view->redirect('/account/login');
        }

    }

    /* public function contactAction()
{
echo 'контакты';
} */

}
