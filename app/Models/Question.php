<?php

namespace App\Models;

use PDO;

class Question extends DB
{
    public function create(int $quizId, string $questionText)
    {

        $query = "INSERT INTO questions (quiz_id, question_text, updated_at, created_at)
                    VALUES (:quizId, :questionText, NOW(), NOW())";
                $stmt = $this->conn->prepare($query);
                $stmt->execute([
                    'quizId' => $quizId,
                    'questionText' => $questionText,
                ]);
                return $this->conn->lastInsertId();
    }
    public function deleteByQuizId(int $questionId): bool{
        $query = "DELETE FROM questions WHERE quiz_id=:questionId";
        $stmt = $this->conn->prepare($query);
         return $stmt->execute([
            'questionId' => $questionId,
        ]);
    }
    public function getWithOptions(int $quizId): void
    {
        $stmt = $this->conn->prepare("SELECT * FROM questions WHERE quiz_id = :quiz_id");
        $stmt->execute([
            "quiz_id" => $quizId,
        ]);
        $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $questionIds = array_column($questions, 'id');
        $placeholders = rtrim(str_repeat('?,', count($questionIds)), ',');

        $query = "SELECT id, question_text FROM questions WHERE quiz_id IN ($placeholders)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute($questionIds);
        $options = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $groupedOptions = [];
        foreach ($options as $option) {
            $groupedOptions[$option['id']][] = $option;

        }
        foreach ($questions as &$question) {
            $question['options'] = $groupedOptions[$question['id']] ?? [];

        }
        apiResponse($questions);
    }


}