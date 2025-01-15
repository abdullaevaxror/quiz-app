<?php

namespace App\Http\Controllers\Web;

class UserController
{
    public function home(): void
    {
        view('dashboard/home');
    }
    public function createQuiz(): void{
        view('/dashboard/create-quiz');
    }
    public function statistics(): void
    {
        view('/dashboard/statistics');
    }

}