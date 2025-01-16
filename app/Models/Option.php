<?php

namespace App\Models;

class Option extends DB
{
    public function create( int $question_id,string $option_text, bool $isCorrect)
    {
        $query = "INSERT INTO options (question_id, option_text, isCorrect, updated_at, created_at) 
                    VALUES(:question_id, :option_text, :isCorrect, NOW(), NOW())";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            'question_id' => $question_id,
            'option_text' => $option_text,
            'isCorrect' => $isCorrect ? 1 : 0,

        ]);
        return $this->conn->lastInsertId();

    }

}