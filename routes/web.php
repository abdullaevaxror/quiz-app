<?php


use App\Http\Controllers\API\QuizController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\UserController;
use src\Router;


Router::get('/todos', [UserController::class, 'index']);
Router::get('/', [HomeController::class, 'home']);
Router::get('/about', [HomeController::class, 'about']);
Router::get('/login', [HomeController::class, 'login']);
Router::get('/register', [HomeController::class, 'register']);
Router::get('/dashboard', [UserController::class, 'home']);
Router::get('/create-quiz', [UserController::class, 'createQuiz']);
Router::get('/statistics', [UserController::class, 'statistics']);

Router::notFound();



