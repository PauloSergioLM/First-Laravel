<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request){
    /*
        echo '<pre>';
     print_r($request->all()); 
     echo '</pre>';
     echo $request->input('nome');
     echo '<br>';
     echo $request->input('email');
     */
    /*
    $contato = new SiteContato();
    $contato->nome = $request->input('nome');
    $contato->telefone = $request->input('telefone');
    $contato->email = $request->input('email');
    $contato->motivo_contato = $request->input('motivo_contato');
    $contato->mensagem = $request->input('mensagem');

        //print_r($contato->getAttributes());
        $contato->save();*/

        $motivo_contatos = MotivoContato::all();


        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }

public function salvar(Request $request){

    $request->validate([
        'nome' => 'required|min:3',
        'telefone' => 'required',
        'email' => 'email',
        'motivo_contatos_id' => 'required',
        'mensagem' => 'required|min:5|max:2000'
    ],
    [
        'nome.required' => 'O campo nome não foi preenchido',
        'nome.min' => 'O campo nome tem que ter mais de 3 caracteres',
        'telefone.required' => 'O campo telefone não foi preenchido',
        'email.email' => 'O campo email não é valido',
        'motivo_contatos_id.required' => 'O motivo do contato não foi escolhido',
        'mensagem.required' => 'O campo mensagem não foi preenchido',
        'mensagem.min' => 'O campo mensagem não pode ter menos que 5 caracteres',
        'mensagem.max' => 'O campo mensagem não pode ter mais que 2000 caracteres'
    ]

);
    SiteContato::create($request->all());
    return redirect()->route('site.index');
}

}
