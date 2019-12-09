<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        /* $vars = [
            'name' => 'Вася',
            'age' => 11,
        ]; */

        $this->view->render('главная страница'/* , $vars */);
    }

    /* public function contactAction()
{
echo 'контакты';
} */

}
