<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request){

        $erro = '';
        if($request->get('erro') == 1){
            $erro = 'O usuário ou a senha estão incorreto';
        }
        if($request->get('erro') == 2){
            $erro = 'Necessario login para entrar nesta pagina';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request){
       $regras = [
           'usuario' => 'required|email',
            'senha' => 'required'
       ];

        $feedback = [
            'usuario.required' => 'O campo usuario é obrigatorio',
            'usuario.email' => 'O campo usuario é um email',
            'senha.required' => 'O campo senha é obrigatorio'
        ];

        $request->validate($regras, $feedback);

        $email = $request->get('usuario');
        $password = $request->get('senha');

         $user = new User();

         $usuario = $user->where('email', $email)->where('password', $password)->get()->first();

         if(isset($usuario->name)){
                session_start();
                $_SESSION['nome'] = $usuario->nome;
                $_SESSION['email'] = $usuario->email;
                return redirect()->route('app.home');
         }
         else{
            return redirect()->route('site.login', ['erro' => 1]);
         }

    }
        public function sair(){
           session_destroy();
           return redirect()->route('site.index');
         }
}