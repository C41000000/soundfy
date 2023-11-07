<?php

namespace App\Http\Controllers;

use App\Models\Arquivo;
use App\Models\Artista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedAtividadesController extends Controller
{

    public function index(){

        if(session()->has('user')){

            $user = session()->get('user')->only('usr_id', 'nome', 'arq_id');
            $arq = Arquivo::where('arq_id', $user['arq_id'])->first();
            $user['path'] = $arq ? $arq->caminho : null;
            $artistas = Artista::all();
            $dependencias = [
                'user' => $user,
                'artistas' => $artistas
            ];

            return view('feed-atividades.index', ['title' => 'Feed - Início'])->with( $dependencias);
        }
        return view('feed-atividades.index', ['title' => 'Feed - Início']);
    }
}
