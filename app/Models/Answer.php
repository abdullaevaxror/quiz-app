<?php

namespace App\Models;

use App\Models\DB;

class Answer extends DB
{
    public function find(int $id)
    {
        $query = "SELECT * FROM answers WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }


    public function create(int $resultId, int $optionId)
    {
        $query = "INSERT INTO answers (result_id, option_id)
                        VALUES (:resultId, :optionId)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            ':resultId' => $resultId,
            ':optionId' => $optionId
        ]);
    }
    public function getCorrectAnswer(int $userId, int $quizId)
    {
        $query = "SELECT COUNT(answers.id) AS correctAnswerCount
                FROM answers
                        JOIN results ON answers.result_id = results.id
                        JOIN options ON answers.option_id = options.id
                WHERE results.user_id = :userId
                        AND results.quiz_id = :quizId
                        AND options.isCorrect = TRUE;";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':userId' => $userId,
            ':quizId' => $quizId
        ]);
        return $stmt->fetch();
    }

}
