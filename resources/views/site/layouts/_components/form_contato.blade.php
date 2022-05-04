<form action={{ route('site.contato') }} method="POST">
    @csrf

    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="{{ $classe_borda_form }}">
    <br>
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="{{ $classe_borda_form }}">
    <br>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{ $classe_borda_form }}">
    <br>
    <select name="motivo_contato" class="{{ $classe_borda_form }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $key => $motivo)
            <option value="{{ $key }}" {{ old('motivo_contato') == $key ? 'selected' : '' }} >{{ $motivo }}</option>
        @endforeach
    </select>
    <br>

    <textarea name="mensagem" class="{{ $classe_borda_form }}">{{ old('mensagem') != '' ? old('mensagem') : 'Preencha aqui a sua mensagem' }}</textarea>

    <br>
    <button type="submit" class="{{ $classe_borda_form }}">ENVIAR</button>
</form>

<pre>
{{ print_r($errors) }}
</pre>