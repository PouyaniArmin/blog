<?php
session_start();

use Controllers\CategoryController;
use Controllers\CreatePostsController;
use Controllers\DashboardController;
use Controllers\HomeController;
use Controllers\LogoutController;
use Controllers\PostsController;
use Controllers\RegisterController;
use Controllers\SettingController;
use Controllers\SocialMedaiController;
use Core\Application;

require_once "./vendor/autoload.php";
$app=new Application();
//url call show view
$app->router->get('/',[HomeController::class,'index']);
$app->router->get('/logout',[LogoutController::class,'index']);
$app->router->get('/register',[RegisterController::class,'index']);
$app->router->post('/register',[RegisterController::class,'index']);
$app->router->get('/dashboard',[DashboardController::class,'index']);
$app->router->post('/dashboard',[DashboardController::class,'index']);
$app->router->post('/dashboard/post',[PostsController::class,'index']);
$app->router->get('/dashboard/post',[PostsController::class,'index']);
$app->router->get('/dashboard/post/create',[CreatePostsController::class,'index']);
$app->router->get('/dashboard/category',[CategoryController::class,'index']);
$app->router->get('/dashboard/socialmedia',[SocialMedaiController::class,'index']);
$app->router->get('/dashboard/setting',[SettingController::class,'index']);
$app->run();

?>