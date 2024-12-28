<?php

use App\Http\Controllers\API\UserController;
use src\Router;


Router::get('/todos', [UserController::class, 'index']);

Router::get('/', function (){
    echo 'Hello World';
});
