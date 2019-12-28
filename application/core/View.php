<?php

namespace application\core;

class View
{
    public $path;
    public $route;
    public $layout = 'default';

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
        // debug($this->path);
    }

    public function render($title, $vars = [])
    {
        extract($vars);
        $path = 'application/views/' . $this->path . '.php';
        if (file_exists($path)) {
            ob_start();
            require $path;
            $content = ob_get_clean();
            require 'application/views/layouts/' . $this->layout . '.php';
        } else {
            echo 'вид не найден ' . $this->path;
        }

    }

    public function redirect($url)
    {
        header('location:' . $url);
        exit;
    }

    public static function errorCode($code)
    {
        http_response_code($code);
        $path = 'application/views/errors/' . $code . '.php';
        if (file_exists($path)) {
            require $path;
        } else {
            echo 'файл не найден ' . $this->path;
        }
        exit;

    }

    public function message($arr)
    {
        //exit(json_encode(['1' => $arr, '2' => $arr2]));
        exit(json_encode($arr));
    }

    public function duomessage($arr,$arr2)
    {
        exit(json_encode(['1' => $arr, '2' => $arr2]));
        // exit(json_encode($arr));
    }

    public function location($url)
    {
        exit(json_encode(['url' => $url]));
    }

}
