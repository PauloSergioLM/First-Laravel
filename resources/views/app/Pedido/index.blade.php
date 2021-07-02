@extends('app.layouts.template')

@section('titulo', 'Pedido')

    @section('conteudo')
      <div class="conteudo-pagina">
            <div class="titulo-pagina-2">
                <h1>Pedido - Listar</h1>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="{{ route('pedido.create') }}">Adicionar</a></li>
                    <li><a href="">Consultar</a></li>
                </ul>
            </div>

            <div class="informacao-pagina">
                <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                <thead>
                    <tr>     
                    <th>ID pedido</th>
                    <th>Cliente</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>  
                @foreach ($pedidos as $pedido)
                      <tr>
                    <td>{{ $pedido->id }}</td>
                    <td>{{ $pedido->cliente_id }}</td>
                    <td><a href="{{ route('pedido.show', ['pedido' => $pedido->id]) }}">Vizualizar</a></td>
                    <td><form id="form_{{ $pedido->id }}" method="post" action="{{ route('pedido.destroy', ['pedido' => $pedido->id])}}">
                        @method('DELETE')
                        @csrf
                    <a href="#" onclick="document.getElementById('form_{{ $pedido->id }}').submit()">Excluir</a>
                    </form></td>
                    <td><a href="{{ route('pedido.edit', ['pedido' => $pedido->id]) }}">Editar</a></td>   
                    </tr>
                @endforeach
                </tbody>
                </table>
                </div>
                {{ $pedidos->appends($request)->links() }}
            </div>
      </div>
    @endsection