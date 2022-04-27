<?php

namespace App\Http\Controllers;

use App\Noticia;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $noticias = Noticia::where('estado_visible', '!=', "not")->get();
        $data = [
            'title' => "Jornal ISPI",
            'menu' => "Home",
            'type' => "home",
            'getNoticias' => $noticias,
        ];

        return view("admin.home", $data);
    }
}