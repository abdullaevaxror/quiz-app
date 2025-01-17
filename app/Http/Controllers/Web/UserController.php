<?php

namespace App\Http\Controllers\WEB;

class UserController
{
    public function home(): void
    {
        view('dashboard/home');

    }
    public function quizzes():void
    {
        view('dashboard/quizzes');
    }
    public function create_quiz():void
    {
        view('dashboard/create-quiz');
    }
    public function statistic():void
    {
        view('dashboard/statistics');
    }
    public function take_quiz():void
    {
        view('quiz/take_quiz');
    }

}