<?php

use Controllers\ContactController;
use Controllers\HomeControllers;
use Controllers\UserController;
use Core\Application;
use Core\Router;
use Dotenv\Dotenv;

require_once realpath(__DIR__.'/vendor/autoload.php');


$app=new Application(__DIR__);
Router::get('/','home');
Router::get('/contact',[ContactController::class,'index']);
Router::get('/about','about');
Router::get('/login',[UserController::class,'login']);
Router::post('/login',[UserController::class,'login']);
Router::get('/register',[UserController::class,'register']);
Router::post('/register',[UserController::class,'register']);
$app->run();