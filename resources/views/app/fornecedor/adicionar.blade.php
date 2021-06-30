@extends('app.layouts.template')

@section('titulo', 'Fornecedor')

    @section('conteudo')
      <div class="conteudo-pagina">
            <div class="titulo-pagina-2">
                <h1>Fornecedor - Adicionar</h1>
            </div>

            <div class="menu">
                <ul>
                    <li><a href={{ route('app.fornecedor.adicionar') }}>Adicionar fornecedor</a></li>
                    <li><a href={{ route('app.fornecedor') }}>Consultar fornecedor</a></li>
                </ul>
            </div>

            <div class="informacao-pagina">
                <div style="width: 30%; margin-left: auto; margin-right: auto;">
                    <form method="post" action={{ route('app.fornecedor.adicionar') }}>
                       <input type="hidden" name="id" value="{{ $fornecedor->id ?? '' }}">
                        @csrf
                         {{$errors->has('nome') ? $errors->first('nome') : '' }} 
                        <input type="text" name="nome" value="{{ $fornecedor->nome ?? old('nome')}}" placeholder="Nome" class="borda-preta">
                         {{$errors->has('email') ? $errors->first('email') : '' }} 
                        <input type="text" name="email" value="{{ $fornecedor->email ?? old('email')}}" placeholder="E-mail"  class="borda-preta">
                         {{$errors->has('uf') ? $errors->first('uf') : '' }} 
                        <input type="text" name="uf" value="{{ $fornecedor->uf ?? old('uf')}}" placeholder="UF" class="borda-preta">
                        <button type="submit" class="borda-preta">Cadastrar</button>
                    </form>
                </div>
            </div>
      </div>
@endsection