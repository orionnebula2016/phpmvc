<?php

//function list
//------------------
//getpath-> get path of 
//getMethod->get method of a request
//getBody-> get body of a form
//isGet-> is get request
//isPost->is post request
//---------------------

namespace app\core;
class Request
{
    public function getPath(){
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path,'?');
        if($position === false)
        {
            return $path;
            
        }
        return substr($path,0,$position);

    }

    public function method(){
        return strtolower($_SERVER['REQUEST_METHOD']);

    }

    public function getBody(){
        $body = [];
        if($this->method()=== 'get')
        {
            foreach($_GET as $key => $values)
            {
                $body[$key] = filter_input(INPUT_GET,$key,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }
        }

        if($this->method()=== 'post')
        {
            foreach($_POST as $key => $values)
            {
                $body[$key] = filter_input(INPUT_POST,$key,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }
        }
        

        return $body;

    }

    public function isGet(){
        return $this->method() === "get";
    }

    public function isPost(){
        return $this->method() === "post";        
    }
}