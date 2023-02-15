<?php

use Controllers\HomeControllers;
use Core\Application;
use Dotenv\Dotenv;

require_once realpath(__DIR__.'/vendor/autoload.php');


$app=new Application(__DIR__);
$app->get('/','home');
$app->run();