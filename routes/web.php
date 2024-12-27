<?php

use App\Http\Controllers\API\UserController;
use App\Http\Router;


Router::get('/todos', [UserController::class, 'index']);

Router::get('/', function (){
    view('home');
});
Router::get('/about', function (){

    view('about');
});