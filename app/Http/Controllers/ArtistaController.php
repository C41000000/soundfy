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
        if($request->method() == "POST"){

            try{
                $dados = $request->all();

                if($request->hasFile('image')){
                    $image = $request->file('image');
                    $default_path = "/img";

                    $nome = $image->getClientOriginalName();
                    $image->move($default_path, $nome);
                }

                $user = User::where('usr_id', $id);

                $user->update([
                    'nome' => $dados['nome'],
                    'nome_usuario' => $dados['nome_usuario'],
                    'email' => $dados['email'],
                    'password' => $dados['password'] ? Hash::make($dados['password']) : $user->password
                ]);
                session()->flash("success-message", "Dados atualizados");
            }
            catch (\Exception $e){
                session()->flash('error-message', 'Ocorreu um erro ao atualizar os dados!');
            }
        }

        $data = User::where("usr_id", $id)->first();
        $data['foto'] = Arquivo::where("arq_id", $data->arq_id)->first();

        return view('artista.edit', ['user' => $data]);
    }
}
