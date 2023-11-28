<?php

namespace App\Http\Controllers;

use App\Models\Arquivo;
use App\Models\FeedAtividades;
use App\Models\User;
use Illuminate\Http\Request;

class ArtistaController extends Controller
{
    public function index($id){
        $data = User::where('usr_id', $id)->first();

        $data['foto'] = Arquivo::where('arq_id', $data['arq_id'])->first();
        $feed = FeedAtividades::where('usr_id', $id)->get();

        foreach($feed as $key => $cada_post){
            $feed[$key]['user'] = $cada_post->user;
            $feed[$key]['user']['foto'] = $cada_post->user->foto;
            $feed[$key]['arqs'] = $cada_post->arquivos;
        }

        return view('artista.index',['user' => $data, 'posts' => $feed]);
    }

    public function edit(Request $request, $id){
        $user = User::where('usr_id', $id)->first();

        if($request->method() == "POST"){
            try{
                $dados = $request->all();
                if($request->hasFile('image')){
                    $image = $request->file('image');
                    $default_path = "/img";

                    $requestImage = $request->image;
                    $extension = $requestImage->extension();
                    $nome = $image->getClientOriginalName();
                    $requestImage->move(public_path('img/'), $nome);

                    $teste = Arquivo::create([
                        'nome' => 'fotoPerfil -'. $dados['nome'],
                        'caminho' => "img/". $nome,
                        'tipo'  => 'foto'
                    ]);

                    $user->arq_id = $teste->arq_id;
                    $user->save();


                }

                $user->update([
                    'nome' => $dados['nome'],
                    'nome_usuario' => $dados['nome_usuario'],
                    'email' => $dados['email'],
                ]);

                $user = User::where('usr_id', $user->usr_id)->first();
                $arq = Arquivo::where('arq_id', $user->arq_id)->first();
                $user['foto'] = $arq ? $arq->caminho : "img/default-photo.png";
                session()->put('user', $user);

                session()->flash("success-message", "Dados atualizados");
            }
            catch (\Exception $e){
                dd($e->getMessage());
                session()->flash('error-message', 'Ocorreu um erro ao atualizar os dados!');
            }
        }

        $data = User::where("usr_id", $id)->first();
        $data['foto'] = Arquivo::where("arq_id", $data->arq_id)->first()->caminho;

        return view('artista.edit', ['user' => $data]);
    }

    public function updateDescription(Request $request, $id){
        $description = $request->all();

        $user = User::where('usr_id', $id)->first();

        if(!$user){
            session()->flash('error-message', 'Artista não identificado');
            return redirect()->route('inicio');
        }

        $user->descricao = $description['descricao'];
        $user->save();
        $user = User::where('usr_id', $user->usr_id)->first();
        $arq = Arquivo::where('arq_id', $user->arq_id)->first();
        $user['foto'] = $arq ? $arq->caminho : "img/default-photo.png";
        session()->put('user', $user);
        session()->flash('success-message', 'Descrição atrualizada com sucesso');

        return view('artista.edit', ['user' => $user]);
    }
}
