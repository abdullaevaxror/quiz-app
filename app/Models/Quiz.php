<?php

namespace App\Models;

use App\Models\DB;

class Quiz extends DB
{
    public function create(int $user_id, string $title, string $description, int $time_limit): bool
    {
        $query = "INSERT INTO quizzes (user_id, title, description, time_limit, updated_at, created_at) 
                    VALUES (:user_id, :title, :description, :time_limit, NOW(), NOW())";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            "user_id" => $user_id,
            "title" => $title,
            "description" => $description,
            "time_limit" => $time_limit,
        ]);
    }
    public function getByUserId(int $user_id): bool|array{
        $query = "SELECT * FROM quizzes WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(["user_id" => $user_id]);
        return $stmt->fetchAll();
    }
    public function delete(int $quiz_id): bool
    {
        $query = "DELETE FROM quizzes WHERE id = :quiz_id";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute(["quiz_id" => $quiz_id]);

    }

}
