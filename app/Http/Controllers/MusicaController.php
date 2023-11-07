<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Musica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MusicaController extends Controller
{
    public function index()
    {
        return view('musica.index', ['title' => "Músicas - Início"]);
    }

    public function showForm()
    {
        $dependencias = [
          'generos' => Genero::all()
        ];



        return view('musica.cadastro', ['title' => 'Músicas - Cadastro'])->with($dependencias);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $user = session()->get('user')->only('usr_id');
        $data['usr_id'] = $user['usr_id'];

        $musica = new Musica();
        $musica->fill($data);
        $musica->save();
    }
}
