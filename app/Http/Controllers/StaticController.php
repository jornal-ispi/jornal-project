<?php

namespace App\Http\Controllers;

use App\Mensagem;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    public static function getSMS($id_user_receive)
    {
        $mensagem = Mensagem::where(['id_user_receive' => $id_user_receive, 'status_sms' => "on"])->get();
        return $mensagem;
    }
}