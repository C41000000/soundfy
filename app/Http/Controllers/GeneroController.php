<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GeneroController extends Controller
{

    public function store(Request $request){

        $validate = Validator::make(
            $request->all(),
            ['nome' => 'required', 'descricao' => 'required'],
            ['email.required' => 'Nome obrigatório', 'descricao.required' => 'Gênero obrigatóriao']
        );

        if($validate->fails()){
            return response()->json("Ocorreu um erro ao criar o gênero", 400);
        }

        $data = $request->only('nome', 'descricao');

        $genero = new Genero();
        $genero->fill($data);
        $genero->save();


        return response()->json($this->toArray($genero), 201);
    }

    public function  toArray($dados){
        return [
            'id_genero' => $dados->id_genero,
            'nome' => $dados->nome,
            'descricao' => $dados->descricao
        ];
    }
}
