<?php
use App\Router;

use Controllers\UserController;

use App\Models\User;
$user = new User();
//dd($user->getUser('abbos@gmail.com', '123456789'));

dd($user->create('Aziz', 'azizbek3465@gamil.com', '123456789'));
//Router::get('/', [UserController::class, 'index']);
//Router::get('/', function (){
//    echo 'Hello World';
//});