<?php

session_start();

use Controllers\ContactController;
use Controllers\DashboardController;
use Controllers\HomeControllers;
use Controllers\PostsController;
use Controllers\UserController;
use Core\Application;
use Core\Router;
use Dotenv\Dotenv;

require_once realpath(__DIR__.'/vendor/autoload.php');


$app=new Application(__DIR__);
Router::get('/',[HomeControllers::class,'index']);
Router::get('/contact',[ContactController::class,'index']);
Router::get('/about','about');
Router::get('/login',[UserController::class,'login']);
Router::post('/login',[UserController::class,'login'],'profile');
Router::get('/register',[UserController::class,'register']);
Router::post('/register',[UserController::class,'register']);
Router::get('/dashboard',[DashboardController::class,'index'],'admin');
//construct check login Router class add check when pages
Router::get('/posts',[PostsController::class,'index']);
Router::get('/logout',[UserController::class,'logout']);
$app->run();


?>