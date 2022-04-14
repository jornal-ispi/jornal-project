<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function logar(Request $request)
    {
        $request->validate([
            'required' => ['required', 'string', 'min:6'],
            'password' => ['required', 'string'],
        ]);

        $user = User::where(['username' => $request->username])->first();
        if (!$user) {
            return back()->with(['error' => "Nome de Usuário Incorrecto"]);
        }

        if ($user->estado == "off") {
            return back()->with(['error' => "Usuário sem permissão"]);
        }

        $credencials = $request->only('username', 'password');
        if (Auth::attempt($credencials)) {
            return redirect()->route('admin');
        } else {
            return back()->with(['error' => "Palavra-Passe Incorrecta"]);
        }
    }

    
}