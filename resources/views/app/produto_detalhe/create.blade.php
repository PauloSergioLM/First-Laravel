@extends('app.layouts.template')

@section('titulo', 'Detalhes do produto')

    @section('conteudo')
      <div class="conteudo-pagina">
            <div class="titulo-pagina-2">
                <h1>Produto - Adicionar detalhes</h1>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="">Editar</a></li>
                </ul>
            </div>

            <div class="informacao-pagina">
                <div style="width: 30%; margin-left: auto; margin-right: auto;">
                    <form method="post" action="{{ route('produto-detalhe.store') }}">
                        @csrf
                         {{$errors->has('produto_id') ? $errors->first('produto_id') : '' }} 
                        <input type="text" name="produto_id" value="{{ old('produto_id')}}" placeholder="Produto ID" class="borda-preta">
                        {{$errors->has('comprimento') ? $errors->first('comprimento') : '' }} 
                        <input type="text" name="comprimento" value="{{ old('comprimento')}}" placeholder="Comprimento"  class="borda-preta">
                        {{$errors->has('largura') ? $errors->first('largura') : '' }} 
                        <input type="text" name="largura" value="{{ old('largura')}}" placeholder="Largura" class="borda-preta">
                        {{$errors->has('altura') ? $errors->first('altura') : '' }} 
                        <input type="text" name="altura" value="{{ old('altura')}}" placeholder="Altura" class="borda-preta">
                        {{$errors->has('unidade_id') ? $errors->first('unidade_id') : '' }} 
                        <select name="unidade_id" class="borda-preta">
                            <option>-- Unidade de medida --</option>
                            @foreach ($unidades as $unidade)
                            <option value="{{ $unidade->id }}" {{ old('unidade_id') == $unidade->id ? 'selected' : ''}}>{{ $unidade->descricao }}</option> 
                            @endforeach
                        </select>

                        <button type="submit" class="borda-preta">Cadastrar</button>
                    </form>
                </div>
            </div>
      </div>
@endsection