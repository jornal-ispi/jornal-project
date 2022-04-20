<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => "Jornal ISPI",
            'menu' => "Home",
            'type' => "home",
        ];

        return view('admin.home', $data);
    }


}