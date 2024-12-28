<?php


use JetBrains\PhpStorm\NoReturn;

function view(string $page, array $data = [])
{
    extract($data); // Bu yerda array "key" ni varible "value" ni esa qiymati qilib oladi
    require 'views/' . $page . '.php';
}


function redirect(string $url)
{
    header("Location: $url");
    exit;
}

function dumpDie($value)
{
    var_dump($value);
    exit();
}
#[NoReturn] function apiResponse($data, $status = 200): void
{
    header('Content-Type: application/json');
    http_response_code($status);
    echo json_encode($data);
    exit();
}

