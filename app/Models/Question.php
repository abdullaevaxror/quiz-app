<?php

namespace App\Models;

use App\Models\DB;

class Question extends DB
{
    public function create(int $quizId, string $questionText): int
    {
        $query = "INSERT INTO questions ( quiz_id,question_text,updated_at, created_at)
                VALUES(:quiz_id,:question_text, NOW(), NOW())";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':quiz_id' => $quizId,
            ':question_text' => $questionText,
        ]);
        return $this->conn->lastInsertId();
    }

    public function deleteByQuizId(int $questionId): bool
    {
        $query = "DELETE FROM questions WHERE quiz_id = :quiz_id";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            ':question_id' => $questionId,
        ]);
    }

    public function getWithOptions(int $quizId): array
    {
        $stmt = $this->conn->prepare("SELECT * FROM questions WHERE quiz_id = :quiz_id");
        $stmt->execute([
            ':quiz_id' => $quizId,
        ]);
        $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $questionIds = array_column($questions, 'id');
        $placeholder = rtrim(str_repeat('?,', count($questionIds)), ',');

        foreach ($questions as &$question) {
            $question['options'] = $groupedOptions[$question['id']] ?? [];
        }
        return $questions;
    }

}