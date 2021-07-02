@extends('app.layouts.template')

@section('titulo', 'Fornecedor')

    @section('conteudo')
      <div class="conteudo-pagina">
            <div class="titulo-pagina-2">
                <h1>Fornecedor - Listar</h1>
            </div>

            <div class="menu">
                <ul>
                     <li><a href={{ route('app.fornecedor.adicionar') }}>Adicionar fornecedor</a></li>
                    <li><a href={{ route('app.fornecedor') }}>Consultar fornecedor</a></li>
                </ul>
            </div>

            <div class="informacao-pagina">
                <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                <thead>
                    <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Uf</th>
                    <th></th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>  
                @foreach ($fornecedores as $fornecedor)
                         <tr>
                    <td>{{ $fornecedor->nome }}</td>
                    <td>{{ $fornecedor->email }}</td>
                    <td>{{ $fornecedor->uf }}</td>
                    <td><a href="{{ route('app.fornecedor.excluir', $fornecedor->id) }}">Excluir</a></td>
                    <td><a href="{{ route('app.fornecedor.editar', $fornecedor->id) }}">Editar</a></td>   
                    </tr>
                    <tr>
                     <td colspan="5">
                     <p>Lista de produtos</p>
                     <table border="1" style="margin:20px;">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($fornecedor->produtos as $key => $produto )
                        <tr>
                            <td>{{ $produto->id }}</td>
                            <td>{{ $produto->nome }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                     </table>
                     </td>
                    </tr>
                @endforeach
                </tbody>
                </table>
                </div>
                {{ $fornecedores->appends($request)->links() }}
            </div>
      </div>
    @endsection