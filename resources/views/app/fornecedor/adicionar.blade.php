
@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')  {{-- Passando o valor 'Fornecedor' para o @yield do template extendido --}}

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - Adicionar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
         </div>

         <div class="informacao-pagina">

            {{ $mensagem }}

            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form method="POST" action="{{ route('app.fornecedor.adicionar') }}">
                    @csrf

                    <input type="text" name="nome" value="{{ old('nome') }}" class="borda-preta" placeholder="Nome">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}

                    <input type="text" name="site" value="{{ old('site') }}" class="borda-preta" placeholder="Site">
                    {{ $errors->has('site') ? $errors->first('site') : '' }}

                    <input type="text" name="uf" value="{{ old('uf') }}" class="borda-preta" placeholder="UF">
                    {{ $errors->has('uf') ? $errors->first('uf') : '' }}

                    <input type="text" name="email" value="{{ old('email') }}" class="borda-preta" placeholder="Email">
                    {{ $errors->has('email') ? $errors->first('email') : '' }}

                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
         </div>
    </div>
@endsection
