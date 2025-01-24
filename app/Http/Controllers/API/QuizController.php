<?php

namespace App\Http\Controllers\API;

use App\Models\Option;
use App\Models\Question;
use App\Models\Quiz;
use App\Traits\Validator;
use JetBrains\PhpStorm\NoReturn;
use Src\Auth;


class QuizController
{
    use Validator;

    public function index ()
    {
        $quizzes=(new Quiz())->getByUserId(Auth::user()->id);
        apiResponse(['quizzes'=> $quizzes]);

    }

    public  function show(int $quizId)
    {
        $quiz=(new Quiz())->find($quizId);
        if($quiz) {
            $questions = (new Question())->getWithOptions($quizId);
            $quiz->questions = $questions;
            apiResponse($quiz);
        }
        apiResponse(['message'=>'Quiz not found'],404);

    }
    public  function showByUniqueValue(string $uniqueValue)
    {
        $quiz = (new Quiz())->findByUniqueValue($uniqueValue);
        if ($quiz) {
            $questions = (new Question())->getWithOptions($quiz->id);
            $quiz->questions = $questions;
            apiResponse($quiz);
        }
        apiResponse(['message' => 'Quiz not found'], 404);
    }
     #[NoReturn] public function store(): void
    {
        $quizItems = $this->validate([
            'title' => 'string',
            'description' => 'string',
            'timeLimit' => 'int',
            'questions' => 'array',

        ]);

        $quiz = new Quiz();
        $question = new Question();
        $option = new Option();

        $quiz_id = $quiz->create(
            Auth::user()->id,
            $quizItems['title'],
            $quizItems['description'],
            $quizItems['timeLimit'],
        );
        $questions = $quizItems['questions'];

        foreach ($questions as $questionItem) {
            $question_id = $question->create($quiz_id, $questionItem['quiz']);
            $correct = $questionItem['correct'];
            foreach ($questionItem['options'] as $key => $optionItem) {
                $option->create($question_id, $optionItem, $correct == $key);
            }
        }
        apiResponse(['message' => 'quiz successfully created'], 201);
    }
    public function update (int $quiz_id): void
    {
        $quizItems = $this->validate([
            'title' => 'string',
            'description' => 'string',
            'timeLimit' => 'integer',
            'questions' => 'array',
        ]);
        $quiz = new Quiz();
        $question = new Question();
        $option = new Option();

        $quiz->update($quiz_id, $quizItems['title'], $quizItems['description'], $quizItems['timeLimit']);


        $question->deleteByQuizId($quiz_id);

        $questions = $quizItems['questions'];
        foreach ($questions as $questionItem) {
            $question_id = $question->create($quiz_id, $questionItem['quiz']);

            $correct = $questionItem['correct'];
            foreach ($questionItem['options'] as $key => $optionItem) {
                $option->create($question_id, $optionItem, $correct == $key);
            }
        }
        apiResponse(['message' => 'quiz successfully updated'], 201);

    }

    public function destroy (int $quiz_id)
    {

        $quiz = new Quiz();

        $quiz->delete($quiz_id);
        apiResponse(['message' => 'quiz successfully deleted'], 200);

    }


}