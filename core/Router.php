<?php

namespace app\core;

class Router
{
    public Request $request;
    public Response $response;
   protected array $routes =[];
    //this function
    public function __construct(Request $request,Response $response){
        $this->response = $response;
        $this->request = $request;
    }

    //array for creating routes table
 

    public function showRoutesTable($routes)
    {
        echo "<pre>";
        var_dump($routes);
        echo "</pre>";
        exit;
    }

    //function for creating route table
    public function get($path,$callback)
    {
        $this->routes['get'][$path]=$callback;

    }

    public function post($path,$callback)
    {
        $this->routes['post'][$path] = $callback;
        
    }

    public function resolve()
    {
        
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;

        if($callback === false)
        {
            $this->response->setStatusCode(404);
            echo $this->renderView("_404");
        }
        else
        {
        if(is_string($callback))
        {
        echo $this->renderView($callback);
        }
        else if(is_array($callback))
        {

            Application::$app->controller = new $callback[0];
            $callback[0] = Application::$app->controller;
            return call_user_func($callback,$this->request);            
        }
        else
        {
            return call_user_func($callback); 
        }
        }


    }

    public function renderView($view,$params=[])
    {

        $layoutContent  = $this->layoutContent();
        $viewContent =  $this->renderOnlyView($view,$params);
        return str_replace('{{content}}',$viewContent,$layoutContent);
    }

    protected function layoutContent()
    {
        $layout = Application::$app->controller->layout;
        include_once Application::$ROOT_DIR  ."/../views/layouts/$layout.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view,$params)
    {
        foreach($params as $key => $values)
        {
            $$key = $values;
        }
        ob_start();
        
        include_once Application::$ROOT_DIR  ."/../views/$view.php";
        return ob_get_clean();
    }

    public function globe()
    {
        echo '<pre>';
        var_dump($_SERVER);
        echo '</pre>';
        exit;
    }


}