<?php

namespace App\Controllers;

class AuthController extends BaseController
{
    private array $data;
    
    public function __construct()
    {
        $this->data = [];
    }

    public function login(): string
    {
        $this->data['title'] = 'Login';
        return view('login/index', $this->data);
    }

    public function register(): string
    {
        $this->data['title'] = 'Register';
        return view('register/index', $this->data);
    }
}
