<h3>Fornecedor</h3>

@if(count($for) > 0 && count($for) < 10)
    <h2> Existem alguns fornecedores ai</h2>
@elseif(count($for) > 10)
    <h2> Tem muita gente aqui se ta doido</h2>
@else
    <h2>Mano não tem ninguem aqui não oshi</h2>
@endif



<br>
@php
 /*if(){

 }
*/
@endphp
<br>
@isset($for)
{{-- Teste em for --}}
@for($i = 0; isset($for[$i]); $i++)
    Forcenedor: {{ $for[$i]['nome'] }}
    <br>
    Status: {{ $for[$i]['status'] }}
    <br>
    CPF: {{ $for[$i]['cpf'] ?? 'Dado não preenchido' }}
    {{-- se testar e não estiver definida ou com valor null sera exibio oque tem depois do '??' --}}
    <br>
    telefone: {{ $for[$i]['ddd'] ?? 'Não passou um ddd'}} {{ $for[$i]['telefone'] ?? 'Não tem telefone'}};
    @switch($for[$i]['ddd'])
        @case ('11')
            São Paulo - SP
            @break
        @case ('32')
            Juiz de fora -MG
            @break
        @case ('85')
            Fortaleza - case
            @break
        @default
            DDD não identificado
    @endswitch    
<br>
ID : {{ $i+1 }}<hr>
@endfor
<br>
<hr>
<br>
<hr>
@php $u = 0 @endphp
@while(isset($for[$u])) {{-- Teste em while --}}
Forcenedor: {{ $for[$u]['nome'] }}
<br>
Status: {{ $for[$u]['status'] }}
<br>
@isset($for[$u]['cpf'])
CPF: {{ $for[$u]['cpf'] ?? 'Dado não preenchido' }} {{-- Como a variavel não existe não será mostrada --}}
<br>
@endisset
telefone: {{ $for[$u]['ddd'] ?? 'Não passou um ddd'}} {{ $for[1]['telefone'] ?? 'Não tem telefone'}}
<br><br>

@isset($for[$u]['cpf'])
CPF: {{ $for[$u]['cpf'] }} {{-- Se a variavel esta vazia retorna true--}}
    @empty($for[$u]['cpf'])
    - Vazio/True
    @endempty
<br><br>
@endisset
@php $u++ @endphp
<hr>
@endwhile

@foreach($for as $indice => $fornecedor) {{-- Usando foreach --}}
    ID: {{ $loop->iteration }} {{-- variavel loop que conta as interações do foreach e forelse--}}
    <br>
    Forcenedor: {{ $fornecedor['nome'] }}
    <br>
    Status: {{ $fornecedor['status'] }}
    <br>
    CPF: {{ $fornecedor['cpf'] ?? 'Dado não preenchido' }}
    <br>
    telefone: {{ $fornecedor['ddd'] ?? 'Não passou um ddd'}} {{ $fornecedor['telefone'] ?? 'Não tem telefone'}};
    <br>
    @if($loop->first)
    Primeiro
    @endif
    <br>
    @if($loop->last)
    Ultimo
    <br>
    Total percorrido : {{ $loop->count}}
    @endif
<hr>
@endforeach
<br><br>
@forelse($for as $indice => $fornecedor) {{-- Usando foreach --}}
    ID: {{ $loop->iteration }}
    <br>
    Forcenedor: @{{ $fornecedor['nome'] }}
    <br>{{-- usando @ antes da teg ela é mostrada do jeito que foi feita --}}
    Status: @{{ $fornecedor['status'] }}
    <br>
    CPF: @{{ $fornecedor['cpf'] ?? 'Dado não preenchido' }}
    <br>
    telefone: @{{ $fornecedor['ddd'] ?? 'Não passou um ddd'}} {{ $fornecedor['telefone'] ?? 'Não tem telefone'}};
<hr>
@empty
Não tem fornecedor cadastrado!
@endforelse


@if( !($for[0]['status'] == 's'))
Fornecedor {{$for[0]['nome']}} inativo
@endif
<br><br>
@unless($for[0]['status'] == 's')
Fornecedor {{$for[0]['nome']}} inativo {{-- unless --}}
@endunless
<br>
@endisset
<br><br>

