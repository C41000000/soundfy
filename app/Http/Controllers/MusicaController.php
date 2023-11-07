<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Artista;
use App\Models\Arquivo;
use App\Models\Musica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MusicaController extends Controller
{
    public function index()
    {
        if(session()->has('user')){
            $user = session()->get('user')->only('usr_id', 'nome', 'arq_id');
            $arq = Arquivo::where('arq_id', $user['arq_id'])->first();
            $user['path'] = $arq ? $arq->caminho : null;
            $dependencias = [
                'user' => $user,
            ];
            return view('musica.index', ['title' => "Músicas - Início"])->with($dependencias);
        }
        return view('musica.index', ['title' => "Músicas - Início"]);
    }

    public function showForm()
    {
        if(!session()->has('user')){
            session()->flash('message-error', 'Usuário não autenticado');
            return redirect()->route('inicio');
        }
        $user = session()->get('user')->only('usr_id', 'nome', 'arq_id');
        $arq = Arquivo::where('arq_id', $user['arq_id'])->first();
        $user['path'] = $arq ? $arq->caminho : null;

        $dependencias = [
            'user' => $user,
            'artista' =>  Artista::all(),
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
