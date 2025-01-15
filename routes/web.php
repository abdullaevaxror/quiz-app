<?php


use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\UserController;
use src\Router;

Router::get('/todos', [UserController::class, 'index']);
Router::get('/', [HomeController::class, 'home']);
Router::get('/about', [HomeController::class, 'about']);
Router::get('/login', [HomeController::class, 'login']);
Router::get('/register', [HomeController::class, 'register']);
//dd($_REQUEST);
Router::get('/dashboard', [UserController::class, 'home']);
Router::get('/quizzes', [UserController::class, 'quizzes']);
Router::get('/create_quiz', [UserController::class, 'create_quiz']);
Router::get('/statistic', [UserController::class, 'statistic']);


//Router::notFound();


