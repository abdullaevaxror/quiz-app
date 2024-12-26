<?php

use Source\Router;
use App\Controllers\API\UserController;


Router::get('/todos', [UserController::class, 'index']);

Router::get('/', function (){
    echo 'Hello World';
});
