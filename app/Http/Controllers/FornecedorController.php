<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedorController extends Controller
{
    public function index(){
        return view('app.fornecedor.index');
    }

    public function listar(Request $request){

        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')
        ->where('email', 'like', '%'.$request->input('email').'%')
        ->where('uf', 'like', '%'.$request->input('uf').'%')->get();

        
        return view('app.fornecedor.listar',   ['fornecedores' => $fornecedores]);
    }

    public function adicionar(Request $request){

        if($request->input('_token') != '' && $request->input('id') == ''){
            $regras = [
                'nome' => 'required|min:3',
                'email' => 'required|email',
                'uf'  => 'required|min:2|max:2'
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido', 
                'nome.min' => 'O campo nome deve ter no minimo 3 caracters',
                'uf.min' => 'O campo Uf deve ter no minimo 2 caracters',
                'uf.max' => 'O campo Uf deve ter no maximo 2 caracters',
                'email.email' => 'O campo email não foi preenchido corretamente', 
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());
        }
        if($request->input('_token') != '' && $request->input('id') != ''){
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());
            
            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id')]); 
        }

        return view('app.fornecedor.adicionar');
    }

    public function editar($id){
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor]);
        }

}
