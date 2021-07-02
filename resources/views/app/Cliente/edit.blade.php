@extends('app.layouts.template')

@section('titulo', 'Cliente')

    @section('conteudo')
      <div class="conteudo-pagina">
            <div class="titulo-pagina-2">
                <h1>Cliente - Editar</h1>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="{{ route('cliente.index') }}">Voltar</a></li>
                    <li><a href="">Consultar</a></li>
                </ul>
            </div>

            <div class="informacao-pagina">
                <div style="width: 30%; margin-left: auto; margin-right: auto;">
                    <form method="post" action="{{ route('cliente.update', ['cliente' => $cliente->id]) }}">

                        @csrf
                        @method('PUT')
                        {{$errors->has('nome') ? $errors->first('nome') : '' }} 
                        <input type="text" name="nome" value="{{ $produto->nome ?? old('nome')}}" placeholder="Nome" class="borda-preta">
                        <button type="submit" class="borda-preta">Cadastrar</button>
                    </form>
                </div>
            </div>
      </div>
@endsection