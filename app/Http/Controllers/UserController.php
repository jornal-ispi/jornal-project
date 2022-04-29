<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'username' => ['required', 'string', 'min:6'],
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
            return redirect()->route('home');
        } else {
            return back()->with(['error' => "Palavra-Passe Incorrecta"]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function index()
    {
        $usuarios = User::where('acesso', '!=', 'admin')->paginate(10);
        $data = [
            'title' => "Usuários",
            'menu' => "Usuários",
            'type' => "admin",
            'getUsuarios' => $usuarios,
        ];

        return view('admin.usuario.listar', $data);
    }

    public function create()
    {
        $data = [
            'title' => "Usuários",
            'menu' => "Usuário",
            'type' => "admin",
        ];

        return view('admin.usuario.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'min:6', 'unique:usuarios,username'],
            'acesso' => ['required', 'string'],
            'estado' => ['required', 'string'],
        ]);

        $password = Hash::make("jornal001");
        //criar codigo de verificacao
        if ($request->acesso == "leitor") {
            $code = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
        } else {
            $code = null;
        }

        $data = [
            'username' => $request->username,
            'password' => $password,
            'acesso' => $request->acesso,
            'codigo' => $code,
            'estado' => $request->estado,
        ];

        if (User::create($data)) {
            return back()->with(['success' => "Feito com sucesso"]);
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        if (!$user) {
            return back()->with(['error' => "Não encontrou usuario"]);
        }
        $data = [
            'title' => "Usuários",
            'menu' => "Usuário",
            'type' => "admin",
            'getUsuario' => $user,
        ];

        return view('admin.usuario.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return back()->with(['error' => "Não encontrou usuario"]);
        }

        $request->validate([
            'username' => ['required', 'string', 'min:6',],
            'acesso' => ['required', 'string'],
            'estado' => ['required', 'string'],
        ]);

        if ($user->username != $request->username) {
            $request->validate([
                'username' => ['required', 'string', 'min:6', 'unique:usuarios,username'],
            ]);
        }

        //criar codigo de verificacao se mudar para leitor
        if ($user->acesso != $request->acesso) {
            if ($request->acesso == "leitor") {
                $code = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
            }
        } else {
            $code = null;
        }

        $data = [
            'username' => $request->username,
            'acesso' => $request->acesso,
            'codigo' => $code,
            'estado' => $request->estado,
        ];

        if (User::find($id)->update($data)) {
            return back()->with(['success' => "Feito com sucesso"]);
        }
    }

    public function perfil()
    {
        $id_user = Auth::user()->id;
        $user = User::find($id_user);
        $data = [
            'title' => "Usuários",
            'menu' => "Usuário",
            'type' => "admin",
            'getUser' => $user,
        ];

        return view('user.perfil', $data);
    }
}
