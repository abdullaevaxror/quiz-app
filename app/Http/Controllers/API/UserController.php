<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Traits\Validator;
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
        apiResponse(['message' => 'User created successfully'], 201);

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
            'error' =>
        [
            'message' => 'Invalid email or password'
        ]
        ], 401);

    }


    public function show()
    {
        $user = Auth::user();
        apiResponse([
            'user' => $user,
        ],200);

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

