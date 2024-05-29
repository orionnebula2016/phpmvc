<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;

class SiteController extends Controller
{

    public static function handleContact(Request $request)
    {
        echo '<pre>';
        var_dump($_POST);
        echo '</pre>';
        exit;
    }
    public function home()
    {
        $params = [
            'name'=>'Mustafa Askari'
        ];
        echo $this->render('home',$params);
    }
    public function contact()
    {
        echo $this->render('contact');
    }

    public function about()
    {
        echo $this->render('about');
    }


}