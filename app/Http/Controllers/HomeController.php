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

    public function single($id)
    {
        $noticia = Noticia::find($id);
        if (!$noticia) {
            return back()->with(['error' => "Nao encontrou"]);
        }

        $data = [
            'title' => $noticia->title,
            'menu' => "Noticia",
            'type' => "home",
            'getNoticia' => $noticia,
        ];

        return view("admin.single", $data);
    }
}
