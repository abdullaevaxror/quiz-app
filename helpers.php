<?php


use JetBrains\PhpStorm\NoReturn;

function view(string $page, array $data = [])
{
    extract($data); // Bu yerda array "key" ni varible "value" ni esa qiymati qilib oladi
    require 'resources/views/' . $page . '.php';
    exit();
}

function components(string $page, array $data = [])
{
    extract($data);
    require 'resources/views/components/' . $page . '.php';

}
function quiz(string $page, array $data = [])
{
    extract($data);
    require 'resources/views/quiz/' . $page . '.php';

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


function assets($fileName): string
{
    return $_ENV['APP_URL'] .'/public' . $fileName;

}

