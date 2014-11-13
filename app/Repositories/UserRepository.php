<?php

namespace App\Repositories;

use App\User;
use Illuminate\Support\Facades\Log;

/*
* UserRepository
*/
class UserRepository
{
    public function __construct()
    {
    }


    public function findByUsernameOrCreate($userData) {
        return User::firstOrCreate([
            'username' => $userData->username,
            'email'    => $userData->email,
            'avatar'   => is_null($userData->avatar) ? '' : $userData->avatar,
        ]);
    }

}