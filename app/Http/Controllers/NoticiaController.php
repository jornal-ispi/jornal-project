<?php

namespace App\Http\Controllers;

use App\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticia::paginate(10);
        $data = [
            'title' => "Notícias",
            'menu' => "Notícias",
            'type' => "admin",
            'getNoticias' => $noticias,
        ];

        return view('admin.noticia.listar', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = [
            'title' => "Notícias",
            'menu' => "Notícias",
            'type' => "admin",
        ];

        return view('admin.noticia.create', $data);
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
            'titulo' => ['required', 'string', 'min:10'],
            'estado' => ['required', 'string'],
            'descricao' => ['required', 'string', 'min:10'],
            'img' => ['required', 'mimes:jpg,jpeg,png,JPG,JPEG,PNG', 'max:10000'],
        ]);
        $id_user = Auth::user()->id;
        $path = null;
        if ($request->hasFile('img') && $request->foto->isValid()) {
            $path = $request->file('img')->store('img_noticias');
            $data['img'] = $path;
        }

        $data = [
            'id_user' => $id_user,
            'title' => $request->titulo,
            'description' => $request->descricao,
            'img' => $path,
            'estado' => "on",
        ];

        if (Noticia::create($data)) {
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
        //
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
