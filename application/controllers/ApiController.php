<?php

namespace application\controllers;

use application\core\Controller;

class ApiController extends Controller
{
    public function settimeAction()
    {
        if (isset($_POST['start_time'])) {
            $time = json_encode($_POST['start_time']);
            debug($time);
        } else {
            echo ('error');
        }
    }
}
