<?php

namespace App\Http\Controllers;

use App\Models\Arquivo;
use App\Models\Artista;
use App\Models\FeedAtividades;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FeedAtividadesController extends Controller
{

    public function index(){
        $feed = FeedAtividades::get();

        foreach($feed as $key => $cada_post){
            $feed[$key]['user'] = $cada_post->user;
            $feed[$key]['user']['foto'] = $cada_post->user->foto;
            $feed[$key]['arqs'] = $cada_post->arquivos;
        }

        if(Session::get('user')){

            $lastUsers = User::where("usr_id", "!=", session()->get('user')->only('usr_id'))->latest()->take(10)->get();
        }else{
            $lastUsers = User::all()->last()->take(5)->get();
        }

        foreach($lastUsers as $key => $cada_usr){
            $lastUsers[$key]['foto'] = $cada_usr->foto['caminho'];
        }
        return view('feed-atividades.index', ['posts' => $feed, 'lastUsers' => $lastUsers]);
    }
}
