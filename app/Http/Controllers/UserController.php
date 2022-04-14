<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login()
    {
        $data = [
            'title' => "Jornal ISPI Login",
            'menu' => "Login",
            'type' => "login",
        ];

        return view('user.login', $data);
    }
}