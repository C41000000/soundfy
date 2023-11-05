<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MusicaController extends Controller
{
    public function index()
    {
        return view('musica.index');
    }

    public function showForm()
    {
        return view('musica.cadastro');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        dd($data);
    }
}
