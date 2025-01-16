<?php

namespace App\Http\Controllers\API;

use App\Models\Question;
use App\Models\Quiz;
use App\Traits\Validator;
use Src\Auth;



class QuizController
{
    use Validator;

    public function store()
    {
        $quizItems=$this->validate([
            'title'=>'string',
            'description'=>'string',
            'timeLimit'=>'int',
            'questions'=>'array',
        ]);
        $quiz=new Quiz();
        $question=new Question();
        $quiz_id=$quiz->create(Auth::user()->id,$quizItems['title'],$quizItems['description'],$quizItems['timeLimit']);
        apiResponse(['message'=>'created succesfully'], 201);
    }
}