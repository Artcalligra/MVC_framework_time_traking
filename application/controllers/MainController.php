<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Db;

class MainController extends Controller
{
    public function indexAction()
    {
        /* $vars = [
        'name' => 'Вася',
        'age' => 11,
        ]; */
        $db = new Db;

        //$form = 2;
        $params = [
            'id' => 2,
        ];

        $date = $db->column('SELECT name FROM users WHERE id = :id' , $params);
        //debug($date);
        $result = $this->model->getNews();
        $vars=[
            'news'=>$result,
        ];
        //debug($result);
        $this->view->render('главная страница' , $vars);
    }

    /* public function contactAction()
{
echo 'контакты';
} */

}
