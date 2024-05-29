<?php

namespace app\core;
class Application
{
    public static string $ROOT_DIR;
    public Request $request;
    public Router $router;
    public Response $response;
    public static Application $app;
    public Controller $controller;


    public function __construct($rootpath)
    {
        self::$ROOT_DIR = $rootpath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request,$this->response);
    }

    public function run()
    {
        $this->router->resolve();
    }

}