@extends('app.layouts.template')

@section('titulo', 'Fornecedor')

    @section('conteudo')
      <div class="conteudo-pagina">
            <div class="titulo-pagina-2">
                <h1>Fornecedor</h1>
            </div>

            <div class="menu">
                <ul>
                    <li><a href={{ route('app.fornecedor.adicionar') }}>Adicionar fornecedor</a></li>
                    <li><a href={{ route('app.fornecedor') }}>Consultar fornecedor</a></li>
                </ul>
            </div>

            <div class="informacao-pagina">
                <div style="width: 30%; margin-left: auto; margin-right: auto;">
                    <form method="post" action={{ route('app.fornecedor.listar') }}>
                        @csrf
                        
                        <input type="text" name="nome" placeholder="Nome" class="borda-preta">
                        <input type="text" name="email" placeholder="E-mail"  class="borda-preta">
                        <input type="text" name="uf" placeholder="UF" class="borda-preta">
                        <button type="submit" class="borda-preta">Pesquisar</button>
                    </form>
                </div>
            </div>
      </div>
    @endsection