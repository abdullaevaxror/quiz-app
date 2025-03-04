<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Traits\Validator;
use JetBrains\PhpStorm\NoReturn;
use Src\Auth;

class UserController
{
    use Validator;

    public function store()
    {
        $userData = $this->validate([
            'full_name' => 'string',
            'email' => 'string',
            'password' => 'string'
        ]);
        $user = new User();
        $user->create($userData['full_name'], $userData['email'], $userData['password']);
        apiResponse(['message' => 'User created successfully', 'token'=> $user->api_token], 201);

    }

    public function login()
    {
        $userData = $this->validate([
            'email' => 'string',
            'password' => 'string'
        ]);
        $user = new User();
        if ($user->getUser($userData['email'], $userData['password'])) {
            apiResponse([
                'message' => 'User logged in successfully',
                'token' => $user->api_token
            ]);
        }
        apiResponse([
            'errors' =>
                [
                    'message' => 'Invalid email or password'
                ]
        ], 401);

    }


    #[NoReturn] public function show(): void
    {
        $user = Auth::user();
        apiResponse([
            'message' => 'User information',
            'data' => $user
        ]);
    }


}














//    public function register()
//    {
//        $userData = $this->validate([
//            'full_name' => 'string',
//            'email' => 'string',
//            'password' => 'string'
//
//        ]);
//        $user = new User();
//        if ($user->getUser($userData['email'], $userData['password'] , $userData['full_name']))
//        {
//            apiResponse([
//                'message' => 'User  registered successfully',
//                'token'=>$user->api_token
//            ]);
//        }
//        apiResponse([
//            'message' => 'Invalid email or password',
//        ], 401);
//    }