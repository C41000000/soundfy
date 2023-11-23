<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjetoMusical extends Controller
{
    public function index(){
        $projetos = \App\Models\ProjetoMusical::get();

        if($projetos->first() == null){
            $projetos = false;
        }


        return view('projeto-musical.index', ['projetos' => $projetos]);
    }
}
