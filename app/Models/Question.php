<?php

namespace App\Models;

class Question extends DB
{
    public function create(int $quizId, string $questionText)
    {
        $query = "INSERT INTO quiz_question (quiz_id, question_text, updated_at, created_at)
                    VALUES (:quizId, :questionText, NOW(), NOW())";
                $stmt = $this->conn->prepare($query);
                $stmt->execute([
                    'quizId' => $quizId,
                    'questionText' => $questionText,
                ]);
                return $this->conn->lastInsertId();
    }

}