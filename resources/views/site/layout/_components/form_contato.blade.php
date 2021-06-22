  {{ $slot }}
   <form action={{ route('site.contato') }} method="post">
                            @csrf
                       
                            {{$errors->has('nome') ? $errors->first('nome') : '' }}       
                            <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class={{ $classe }}>
                            <br>
                            {{$errors->has('telefone') ? $errors->first('telefone') : '' }} 
                            <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class={{ $classe }}>
                            <br>
                            {{$errors->has('email') ? $errors->first('email') : ''}} 
                            <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class={{ $classe }}>
                            <br>
                            {{$errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : '' }} 
                            <select name="motivo_contatos_id" class={{ $classe }}>
                                <option value="">Qual o motivo do contato?</option>
                                @foreach($motivo_contatos as $key => $motivo_contato)
                                <option value="{{$motivo_contato->id}}" {{ old("motivo_contatos_id") == $motivo_contato->id ? 'selected' : '' }}>{{$motivo_contato->motivo_contato}}</option>
                                @endforeach
                            </select>
                            <br>
                            {{$errors->has('mensagem') ? $errors->first('mensagem') : '' }} 
                            <textarea name="mensagem" class={{ $classe }} placeholder="Preencha aqui a sua mensagem" >{{ old('mensagem') }}</textarea>
                            <br>
                            <button type="submit" class={{ $classe }}>ENVIAR</button>
                        </form>
