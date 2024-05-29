<?php


namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\RegisterModel;

class AuthController extends Controller
{
    public function login()
    {
        $this->setLayout('auth');
        echo $this->render('login');
    }

    public function register(Request $request)
    {
        $this->setLayout('auth');
        $registerModel = new RegisterModel();

        if($request->isPost())
        {
            $registerModel->loadData($request->getBody());
            echo '<pre>';
            var_dump($registerModel);
            echo '</pre>';
            exit;
            if($registerModel->validate() && $registerModel->register())
            {
                return 'success';
            }
            return $this->render('register',[
                'model' => $registerModel
            ]);
        }
        echo $this->render('register');
    }
}