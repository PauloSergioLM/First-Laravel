@extends('app.layouts.template')

@section('titulo', 'Produto')

    @section('conteudo')
      <div class="conteudo-pagina">
            <div class="titulo-pagina-2">
                <h1>Produto - Vizualizar</h1>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="{{ route('produto.index') }}">Voltar</a></li>
                    <li><a href="">Consultar</a></li>
                </ul>
            </div>

            <div class="informacao-pagina">
                <div style="width: 30%; margin-left: auto; margin-right: auto;">
                    <table border="1" style="text-align: left;" width="100%">
                <thead>
                    <tr>
                    <th>ID:</th>
                    <th>{{ $produto->id }}</th>
                    </tr>
                    <tr>
                    <th>Nome:</th>
                    <th>{{ $produto->nome }}</th>
                    </tr>
                    <tr>
                    <th>Descrição:</th>
                    <th>{{ $produto->descricao }}</th>
                    </tr>
                    <tr>
                    <th>Peso:</th>
                    <th>{{ $produto->peso }} Kg</th>
                    </tr>
                    <tr>
                    <th>Unidade:</th>
                    <th>{{ $produto->unidade_id }}</th>
                    </tr>
                </thead>
               
                </table>
                </div>
            </div>
      </div>
@endsection