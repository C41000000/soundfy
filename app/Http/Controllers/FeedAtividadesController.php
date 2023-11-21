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
            $feed[$key]['user']['foto'] = $cada_post->user->foto ? $cada_post->user->foto : null;
            $feed[$key]['arqs'] = $cada_post->arquivos;
        }

        $lastUsers = User::all()->last()->take(5)->get();

        foreach($lastUsers as $key => $cada_usr){
            if(session()->get('user') && $cada_usr->usr_id == session()->get('user')->only('user_id')){
                unset($lastUsers[$key]);
                continue;
            }
            $lastUsers[$key]['foto'] = $cada_usr->foto ? $cada_usr->foto['caminho'] : "img/default-photo.png";
        }
        return view('feed-atividades.index', ['posts' => $feed, 'lastUsers' => $lastUsers]);
    }
}
