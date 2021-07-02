@extends('app.layouts.template')

@section('titulo', 'Produto')

    @section('conteudo')
      <div class="conteudo-pagina">
            <div class="titulo-pagina-2">
                <h1>Produto - Adicionar</h1>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="{{ route('produto.index') }}">Voltar</a></li>
                    <li><a href="">Consultar</a></li>
                </ul>
            </div>

            <div class="informacao-pagina">
                <div style="width: 30%; margin-left: auto; margin-right: auto;">
                    <form method="post" action="{{ route('produto.store', ['fornecedores' => $fornecedores]) }}">
                       <input type="hidden" name="id" value="">
                        @csrf
                        {{$errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : '' }} 
                        <select name="fornecedor_id" class="borda-preta">
                            <option>-- Selecione um Fornecedor --</option>
                            @foreach ($fornecedores as $fornecedor)
                            <option value="{{ $fornecedor->id }}" {{ $produto->fornecedor_id ?? old('fornecedor') == $fornecedor->id ? 'selected' : ''}}>{{ $fornecedor->nome }}</option> 
                            @endforeach
                        </select>
                         {{$errors->has('nome') ? $errors->first('nome') : '' }} 
                        <input type="text" name="nome" value="{{ old('nome')}}" placeholder="Nome" class="borda-preta">
                        {{$errors->has('descricao') ? $errors->first('descricao') : '' }} 
                        <input type="text" name="descricao" value="{{ old('descricao')}}" placeholder="Descrição"  class="borda-preta">
                        {{$errors->has('peso') ? $errors->first('peso') : '' }} 
                        <input type="text" name="peso" value="{{ old('peso')}}" placeholder="Peso" class="borda-preta">
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