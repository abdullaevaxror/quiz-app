<?php
use App\Router;

use Controllers\UserController;

$userController = UserController::class;

Router::get('/', [UserController::class, 'index']);
//Router::get('/', function (){
//    echo 'Hello World';
//});