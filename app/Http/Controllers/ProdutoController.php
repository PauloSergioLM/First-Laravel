<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Item;
use App\Unidade;
use App\ProdutoDetalhe;
use App\Fornecedor;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        $produtos = Item::paginate(10);
        
        return view('app.produto.index',   ['produtos' => $produtos, 'request' => $request->all() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.create', ['unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if($request->input('_token') != '' && $request->input('id') == ''){
            $regras = [
                'nome' => 'required|min:3',
                'descricao' => 'required|min:5',
                'peso'  => 'required|integer',
                'unidade_id' => 'exists:unidades,id',
                'fornecedor_id' => 'exists:fornecedores,id'
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido', 
                'nome.min' => 'O campo nome deve ter no minimo 3 caracters',
                'descricao.min' => 'O campo Descrição deve ter no minimo 5 caracters',
                'peso.integer' => 'O campo Peso deve ser um numero inteiro',
                'unidade_id.exists' => 'Unidade invalida',
                'fornecedor_id.exists' => 'Fornecedor invalido'
            ];

            $request->validate($regras, $feedback);

            Item::create($request->all());
            return redirect()->route('produto.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $produto)
    {
        $regras = [
            'nome' => 'required|min:3',
            'descricao' => 'required|min:5',
            'peso'  => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido', 
            'nome.min' => 'O campo nome deve ter no minimo 3 caracters',
            'descricao.min' => 'O campo Descrição deve ter no minimo 5 caracters',
            'peso.integer' => 'O campo Peso deve ser um numero inteiro',
            'unidade_id.exists' => 'Unidade invalida',
            'fornecedor_id.exists' => 'Fornecedor invalido'
        ];

        $request->validate($regras, $feedback);

        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
