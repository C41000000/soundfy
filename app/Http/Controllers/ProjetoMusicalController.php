<?php

namespace App\Http\Controllers;

use App\Models\Musica;
use App\Models\ProjetoMusica;
use App\Models\ProjetoMusical;
use App\Models\User;
use App\Models\UsuarioProjeto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjetoMusicalController extends Controller
{
    public function index(){
        $projetos = ProjetoMusical::get()->first();
//        dd($projetos->musica);
        if($projetos->first() == null){
            $projetos = false;
        }


        return view('projeto-musical.index', ['projetos' => $projetos]);
    }

    public function create(Request $request){

        if($request->method() == "POST"){
            try{
                DB::beginTransaction();
                $data = $request->all();

                $projeto = ProjetoMusical::create([
                    'nome' => $data['nome'],
                    'descricao' => $data['descricao'],
                    'usr_id' => session()->get('user')->usr_id
                ]);

                if($data['musicas']){
                    foreach($data['musicas'] as $cada_musica){
                        ProjetoMusica::create([
                            'id_musica' => $cada_musica,
                            'id_projeto' => $projeto->id_projeto
                        ]);
                    }
                }

                if($data['artistas']){
                    foreach($data['artistas'] as $cada_artista){
                        UsuarioProjeto::create([
                            'usr_id' => $cada_artista,
                            'id_projeto' => $projeto->id_projeto
                        ]);
                    }
                }
                DB::commit();
                session()->flash('success-message', 'Projeto criado com sucesso!');
                return redirect()->route('projetos');
            }
            catch (Exception $e){
                session()->flash('error-message', $e->getMessage());
                DB::rollBack();
            }
        }

        $usuarios = User::where('usr_id', "!=", session()->get('user')->usr_id)->get();
        $musicas = Musica::where('usr_id', session()->get('user')->usr_id)->get();


        return view('projeto-musical.create', ['users' => $usuarios, 'musicas' => $musicas]);
    }
}
