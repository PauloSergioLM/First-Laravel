@extends('app.layouts.template')

@section('titulo', 'Detalhes do produto')

    @section('conteudo')
      <div class="conteudo-pagina">
            <div class="titulo-pagina-2">
                <h1>Produto - Editar detalhes</h1>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="">Voltar</a></li>
                </ul>
            </div>

            <div class="informacao-pagina">

                <h4>Produto</h4>
                <div>Nome: {{ $produto_detalhe->produto->nome }}</div>
                <br>
                <div>Descrição: {{ $produto_detalhe->produto->descricao }}</div>
                <br>
                <div style="width: 30%; margin-left: auto; margin-right: auto;">
                    <form method="post" action="{{ route('produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id]) }}">
                        @csrf
                        @method('PUT')
                        {{$errors->has('produto_id') ? $errors->first('produto_id') : '' }} 
                        <input type="text" name="produto_id" value="{{ $produto_detalhe->produto_id ?? old('produto_id')}}" placeholder="Produto ID" class="borda-preta">
                        {{$errors->has('comprimento') ? $errors->first('comprimento') : '' }} 
                        <input type="text" name="comprimento" value="{{ $produto_detalhe->comprimento ?? old('comprimento')}}" placeholder="Comprimento"  class="borda-preta">
                        {{$errors->has('largura') ? $errors->first('largura') : '' }} 
                        <input type="text" name="largura" value="{{ $produto_detalhe->largura ?? old('largura')}}" placeholder="Largura" class="borda-preta">
                        {{$errors->has('altura') ? $errors->first('altura') : '' }} 
                        <input type="text" name="altura" value="{{ $produto_detalhe->altura ?? old('altura')}}" placeholder="Altura" class="borda-preta">
                        {{$errors->has('unidade_id') ? $errors->first('unidade_id') : '' }} 
                        <select name="unidade_id" class="borda-preta">
                            <option>-- Unidade de medida --</option>
                            @foreach ($unidades as $unidade)
                            <option value="{{ $unidade->id }}" {{ $produto_detalhe->unidade_id ?? old('unidade_id') == $unidade->id ? 'selected' : ''}}>{{ $unidade->descricao }}</option> 
                            @endforeach
                        </select>
                        <button type="submit" class="borda-preta">Cadastrar</button>
                    </form>
                </div>
            </div>
      </div>
@endsection