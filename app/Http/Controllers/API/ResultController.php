<?php

namespace App\Http\Controllers\API;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\Result;
use App\Traits\Validator;
use Src\Auth;

class ResultController
{
    use Validator;
    public function store(){
        $resultItems=$this->validate([
            'quizId'=>'required|integer',
        ]);
        $quiz= (new  Quiz())->find($resultItems['quizId']);

        if($quiz) {
            $result=new Result();
            $result->create(
                Auth::user()->id,
                $quiz->id,
                $quiz->time_limit,
            );

            apiResponse([

                    'message'=>'Results created successfully',

            ]);
        }
        apiResponse([
            'errors'=>[
                'message'=>'Quiz not found',]
        ], 404);

    }

}