<?php

namespace App\Http\Controllers\Web;

use JetBrains\PhpStorm\NoReturn;

class UserController
{
    public function home(): void
    {
        view('dashboard/home');
    }
    public function create_quiz(): void{
        view('/dashboard/create-quiz');
    }
    public function statistics(): void
    {
        view('/dashboard/statistics');
    }
    public function quizzes(): void
    {
        view('/dashboard/quizzes');

    }
    public function take_quiz(): void{
        view('quiz/take-quiz');
    }
    #[NoReturn] public function handlePost(): void
    {

    }

}