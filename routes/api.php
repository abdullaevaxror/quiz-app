<?php

use App\Router;
$router = new Router();

Router::get('/', function (){
    echo 'Hello World';
});