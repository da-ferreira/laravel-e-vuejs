<form action={{ route('site.contato') }} method="POST">
    @csrf

    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="{{ $classe_borda_form }}"> <br>

    {{ $errors->has('nome') ? $errors->first('nome') : '' }}

    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="{{ $classe_borda_form }}"> <br>

    {{ $errors->has('telefone') ? $errors->first('telefone') : '' }}

    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{ $classe_borda_form }}"> <br>

    {{ $errors->has('email') ? $errors->first('email') : '' }}

    <select name="motivo_contatos_id" class="{{ $classe_borda_form }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $key => $motivo)
            <option value="{{ $motivo->id }}" {{ old('motivo_contatos_id') == $motivo->id  ? 'selected' : '' }} >{{ $motivo->motivo_contato }}</option>
        @endforeach
    </select>

    {{ $errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : '' }}

    <br>

    <textarea name="mensagem" class="{{ $classe_borda_form }}">{{ old('mensagem') != '' ? old('mensagem') : 'Preencha aqui a sua mensagem' }}</textarea>

    {{ $errors->has('mensagem') ? $errors->first('mensagem') : '' }}

    <br>
    <button type="submit" class="{{ $classe_borda_form }}">ENVIAR</button>
</form>

@if ($errors->any())  {{-- Se a variável possui algum erro --}}
    @foreach ($errors->all() as $erro)
        {{ $erro }}
        <br>
    @endforeach
@endif
