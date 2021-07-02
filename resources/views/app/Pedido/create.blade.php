@extends('app.layouts.template')

@section('titulo', 'Pedido')

    @section('conteudo')
      <div class="conteudo-pagina">
            <div class="titulo-pagina-2">
                <h1>Pedido - Adicionar</h1>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
                    <li><a href="">Consultar</a></li>
                </ul>
            </div>

            <div class="informacao-pagina">
                <div style="width: 30%; margin-left: auto; margin-right: auto;">
                    <form method="post" action="{{ route('pedido.store', ['clientes' => $clientes]) }}">
                       <input type="hidden" name="id" value="">
                        @csrf    
                        {{$errors->has('cliente_id') ? $errors->first('cliente_id') : '' }} 
                        <select name="cliente_id" class="borda-preta">
                            <option>-- Selecione um Cliente --</option>
                            @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->id }}" {{ $pedido->cliente_id ?? old('cliente_id') == $cliente->id ? 'selected' : ''}}>{{ $cliente->nome }}</option> 
                            @endforeach
                        </select> 
                        <button type="submit" class="borda-preta">Cadastrar</button>
                    </form>
                </div>
            </div>
      </div>
@endsection