@extends('app.layouts.template')

@section('titulo', 'Produto')

    @section('conteudo')
      <div class="conteudo-pagina">
            <div class="titulo-pagina-2">
                <h1>Produto - Listar</h1>
            </div>

            <div class="menu">
                <ul>
                     <li><a href="{{ route('produto.create') }}">Adicionar</a></li>
                    <li><a href="">Consultar</a></li>
                </ul>
            </div>

            <div class="informacao-pagina">
                <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                <thead>
                    <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Peso - KG</th>
                    <th>Unidade ID</th>
                    <th>Comprimento</th>
                    <th>Altura</th>
                    <th>Largura</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>  
                @foreach ($produtos as $produto)
                      <tr>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->descricao }}</td>
                    <td>{{ $produto->peso }}</td>
                    <td>{{ $produto->unidade_id }}</td>
                    <th>{{ $produto->produtoDetalhe->comprimento ?? ' '}}</th>
                    <th>{{ $produto->produtoDetalhe->altura ?? '' }}</th>
                    <th>{{ $produto->produtoDetalhe->largura ?? '' }}</th>
                    <td><a href="{{ route('produto.show', ['produto' => $produto->id]) }}">Vizualizar</a></td>
                    <td><form id="form_{{ $produto->id }}" method="post" action="{{ route('produto.destroy', ['produto' => $produto->id])}}">
                        @method('DELETE')
                        @csrf
                    <a href="#" onclick="document.getElementById('form_{{ $produto->id }}').submit()">Excluir</a>
                    </form></td>
                    <td><a href="{{ route('produto.edit', ['produto' => $produto->id]) }}">Editar</a></td>   
                    </tr>
                @endforeach
                </tbody>
                </table>
                </div>
                {{ $produtos->appends($request)->links() }}
            </div>
      </div>
    @endsection