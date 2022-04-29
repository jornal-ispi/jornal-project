<?php

namespace App\Http\Controllers;

use App\Mensagem;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_user = Auth::user()->id;
        $mensagem = Mensagem::orderBy('id', 'desc')->where(['id_user_receive' => $id_user])->paginate(10);
        $data = [
            'title' => "Chat",
            'menu' => "Chat",
            'type' => "admin",
            'getMensagens' => $mensagem,
        ];

        return view('admin.chat.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => "Chat",
            'menu' => "Chat",
            'type' => "admin",
        ];
        return view('admin.chat.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'sms' => ['required', 'string', 'min:3'],
        ]);

        $id_user_receive = 1;
        $id_user_send = Auth::user()->id;
        $user = User::find($id_user_send);
        $data = [
            'id_user_send' => $id_user_send,
            'id_user_receive' => $id_user_receive,
            'sms' => $request->sms . " :: " . $user->codigo,
            'status_sms' => "on",
            'estado' => "on",
        ];

        if (Mensagem::create($data)) {
            return back()->with(['success' => "Feito com sucesso"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mensagem = Mensagem::find($id);
        if (!$mensagem) {
            return back()->with(['error' => "Nao encontrou mensagem"]);
        }
        $mensagem1 = Mensagem::find($id)->update(['status_sms' => "vista"]);
        $data = [
            'title' => "Chat",
            'menu' => "Chat",
            'type' => "admin",
            'getMensagem' => $mensagem,
        ];
        return view('admin.chat.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

    }
}