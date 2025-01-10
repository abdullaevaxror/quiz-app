<?php

namespace App\Http\Controllers\WEB;

class UserController
{
    public function home(): void
    {
        view('dashboard/home');
    }
}