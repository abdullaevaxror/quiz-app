<?php

namespace App\Http\Controllers\Web;

use App\Models\Quiz;

class QuizController
{
    public function take_quiz(string $uniqueValue): void{

            view('quiz/take-quiz',['uniqueValue'=>$uniqueValue]);


    }

}