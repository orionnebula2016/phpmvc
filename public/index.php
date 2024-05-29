<?php

require_once(dirname(__FILE__) ."/../vendor/autoload.php");

use app\controllers\AuthController;
use app\controllers\SiteController;
use app\core\Application;

//class initiation for creating objects
//this objects uses 
$app = new Application(dirname(__FILE__));

//get methods
$app->router->get('/',[SiteController::class,'home']);
$app->router->get('/contact',[SiteController::class,'contact']);
$app->router->get('/about',[SiteController::class,'about']);
$app->router->get('/login',[AuthController::class,'login']);
$app->router->get('/register',[AuthController::class,'register']);

//post methods
$app->router->post('/contact',[SiteController::class,'handleContact']);
$app->router->post('/login',[AuthController::class,'login']);
$app->router->post('/register',[AuthController::class,'register']);

$app->run();

