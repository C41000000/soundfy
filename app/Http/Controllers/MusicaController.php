<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Artista;
use App\Models\Arquivo;
use App\Models\Musica;
use DB;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

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
        $dependencias = [
            'generos' => Genero::all()
        ];

        return view('musica.cadastro', ['title' => 'Músicas - Cadastro'])->with($dependencias);
    }

    public function show($id)
    {
        $dependencias = [
            'generos' => Genero::all(),
            'musica' => Musica::find($id)
        ];

        return view('musica.cadastro', ['title' => 'Músicas - Editar'])->with($dependencias);
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

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $musica = Musica::find($id);
        $musica->fill($data);
        $musica->save();
    }

    public function list()
    {
        $music = Musica::select([
            'musica.titulo as titulo_musica',
            'genero.nome as nome_genero',
            'users.nome as compositor',
            DB::raw('DATE_FORMAT("musica.created_at", "%d/%m/%Y") as data_criacao')
        ])
            ->leftJoin('genero', 'genero.id_genero', 'musica.id_genero')
            ->leftJoin('pessoas', 'musica.usr_id', 'users.usr_id');

        return DataTables::of($music)->make();
    }
}
