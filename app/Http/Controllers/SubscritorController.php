<?php

namespace App\Http\Controllers;

use App\Subscritor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscritorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscritors = Subscritor::paginate(10);
        $data = [
            'title' => "Subscritores",
            'menu' => "Subscritores",
            'type' => "admin",
            'getSubscritors' => $subscritors,
        ];

        return view('admin.subscritor.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => "Subscritores",
            'menu' => "Subscritores",
            'type' => "admin",
        ];

        return view('admin.subscritor.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'unique:subscritors,email'],
        ]);
        $id_user = Auth::user()->id;
        $data = [
            'id_user' => $id_user,
            'email' => $request->email,
            'estado' => "on",
        ];

        if (Subscritor::create($data)) {
            return back()->with(['success' => "Feitoc com sucesso"]);
        }
    }
}
