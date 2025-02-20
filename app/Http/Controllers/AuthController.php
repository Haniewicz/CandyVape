<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Models\User;

class AuthController extends Controller
{
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function index()
    {
        return view('welcome');
    }

    public function register_view()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users',
            'password' => 'required'
        ]);

        if($this->authService->register($request->input('name'), $request->input('password')))
        {
            return redirect('/');
        }else{
            return view('register');
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        if($this->authService->login($request->input('name'), $request->input('password')))
        {
            return redirect('/dashboard');
        } else {
            return view('dashboard');
        }
    }

    public function logout()
    {
        if($this->authService->logout())
        {
            return redirect('/');
        } else {
            return redirect('/dashboard');
        }
    }
}
