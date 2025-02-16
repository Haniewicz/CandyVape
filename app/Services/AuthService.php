<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function login(string $name, string $password)
    {
        if(Auth::attempt(['name' => $name, 'password' => $password]))
        {
            return true;
        } else {
            return false;
        }
    }

    public function logout()
    {
        
    }

    public function register(string $name, string $password)
    {
        if(User::create([
            'name' => $name,
            'password' => Hash::make($password),
        ]))
        {
            return true;
        } else {
            return false;
        }
    }

}
