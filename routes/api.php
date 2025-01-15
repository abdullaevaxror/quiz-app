<?php

use App\Http\Controllers\API\QuizController;
use App\Http\Controllers\API\UserController;
use Src\Router;

Router::get('/api/users/{id}', [UserController::class, 'show'], 'auth:api');

Router::get('/api/users/{id}', [UserController::class, 'show'], 'auth:api');

Router::post('/api/register', [UserController::class, 'store']);
Router::post('/api/login', [UserController::class, 'login']);

Router::post('/api/quizzes', [QuizController::class, 'store']);

Router::notFound();