<?php

namespace app\core;
use app\core\Application;

class Controller
{
    public string $layout = 'main';
    public function setLayout($layout)
    {
        return $layout;

    }
    public function render($view,$params = [])
    {
        return Application::$app->router->renderview($view,$params);
    }

}