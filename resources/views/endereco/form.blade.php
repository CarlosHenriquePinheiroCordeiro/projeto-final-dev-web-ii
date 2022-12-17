@if(!isset($dados['visualizar']))
    @csrf
@endif
<label for="pessoa_id">Pessoa do Endereço</label>
<select required name="pessoa_id" id="pessoa_id" @if (isset($dados['visualizar'])) {{'disabled'}} @endif >
    @foreach ($dados['pessoas'] as $pessoa)
        <option @if (isset($dados['endereco']) && ($dados['endereco']->pessoa_id == $pessoa->id)) {{'selected'}} @endif value={{$pessoa->id}} >{{$pessoa->nome}}</option>
    @endforeach
</select>
<br>
<label for="rua">Rua</label>
<input required name="rua" id="rua" @if (isset($dados['visualizar'])) {{'readonly'}} @endif value='@if(isset($dados['endereco'])){{$dados['endereco']->rua}}@endif'  >
<br>
<label for="bairro">Bairro</label>
<input required name="bairro" id="bairro" @if (isset($dados['visualizar'])) {{'readonly'}} @endif value='@if(isset($dados['endereco'])){{$dados['endereco']->bairro}}@endif'  >
<br>
<label for="numero">Número</label>
<input type="number" required name="numero" id="numero" @if (isset($dados['visualizar'])) {{'readonly'}} @endif value=@if(isset($dados['endereco'])) {{$dados['endereco']->numero}} @endif  >
<br>
<label for="cidade_id">Cidade</label>
<select required name="cidade_id" id="cidade_id" @if (isset($dados['visualizar'])) {{'disabled'}} @endif >
    @foreach ($dados['cidades'] as $cidade)
        <option @if (isset($dados['endereco']) && ($dados['endereco']->cidade_id == $cidade->id)) {{'selected'}} @endif value={{$cidade->id}} >{{$cidade->nome}}</option>
    @endforeach
</select>
<br>
@if(!isset($dados['visualizar']))
    <button class="btn btn-outline-primary" type="submit">Enviar</button>
@endif