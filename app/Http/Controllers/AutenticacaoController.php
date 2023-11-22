<?php

namespace App\Http\Controllers;

use App\Models\Arquivo;
use App\Models\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AutenticacaoController extends Controller
{
    public function login(Request $request){
        $validate = Validator::make(
            $request->all(),
            ['email' => 'required', 'password' => 'required'],
            ['email.required' => 'Email obrigatório', 'password.required' => 'Senha obrigatória']
        );

        if(session()->has('user')){
            return redirect()->route('inicio');
        }
        if($request->method() == "POST"){

            $creds = $request->only('email', 'password');

            if(Auth::attempt($creds)){
                $user = User::where('email', $creds['email'])->first();
                $arq = Arquivo::where('arq_id', $user->arq_id)->first();

                $user['foto'] = $arq ? $arq->caminho : "img/default-photo.png";
                session()->put('user', $user);

                session()->flash('success-message', 'Autenticado com sucesso!');

                return redirect()->route('inicio');
            }else if($validate->fails()){
                session()->flash('error-message',  $validate->errors()->first());
            }else{
                session()->flash('error-message', 'Usuário ou senha inválida!');
                return redirect()->route('login');
            }

        }

        return view('login');
    }

    public function cadastro(Request $request){
        $validate = Validator::make(
            $request->all(),
            ['email' => 'required|unique:users,email', 'password' => 'required'],
            ['email.required' => 'Email obrigatório', 'email.unique' => 'Email já registrado', 'password.required' => 'Senha obrigatória']
        );

        if($validate->fails()){
            session()->flash('error-message', $validate->errors()->first());
            return view('login');
        }

        $creds = $request->only('email', 'nome', 'nome_usuario');


        $pass = Hash::make($request->password);
        $creds['password'] = $pass;

        User::create($creds);

        if(Auth::attempt($creds)){
            $user = User::where('email', $creds['email'])->first();
            session()->put('user', $user);
            return redirect()->route('inicio');
        }
        return view('login');
    }

    public function logout(){
        session()->flush();
        session()->invalidate();

        return redirect()->route('inicio');
    }
}
