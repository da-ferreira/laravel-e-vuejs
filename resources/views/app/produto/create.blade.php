
@extends('app.layouts.basico')

@section('titulo', 'Produto')  {{-- Passando o valor 'Produto' para o @yield do template extendido --}}

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Produto</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
         </div>

         <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form method="POST" action="{{ route('produto.store') }}">
                    @csrf

                    <input type="text" name="nome" value="{{ old('nome') }}" class="borda-preta" placeholder="Nome">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}

                    <input type="text" name="descricao" value="{{ old('descricao') }}" class="borda-preta" placeholder="Descrição">
                    {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}

                    <input type="text" name="peso" value="{{ old('peso') }}" class="borda-preta" placeholder="Peso">
                    {{ $errors->has('peso') ? $errors->first('peso') : '' }}

                    <select name="unidade_id">
                        <option>-- Selecione a unidade de medida --</option>

                        @foreach ($unidades as $unidade)
                            <option value="{{ $unidade['id'] }}" {{ old('unidade_id') == $unidade['id'] ? 'selected' : '' }}>Unidade {{ $unidade['id'] }}</option>
                        @endforeach
                    </select>
                    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
         </div>
    </div>
@endsection
