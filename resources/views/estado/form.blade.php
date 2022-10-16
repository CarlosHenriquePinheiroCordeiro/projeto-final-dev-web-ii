@if(!isset($dados['visualizar']))
    @csrf
@endif
<label for="id">ID</label>
<input type="number" name="id" id="id" @if (isset($dados['visualizar']) || isset($dados['insert'])) {{'readonly'}} @endif value=@if(isset($dados['estado'])) {{$dados['estado']->id}} @endif >
<br>
<label for="nome">Nome</label>
<input required name="nome" id="nome" @if (isset($dados['visualizar'])) {{'readonly'}} @endif value='@if(isset($dados['estado'])){{$dados['estado']->nome}}@endif'  >
<br>
<label for="sigla">Sigla</label>
<input required name="sigla" id="sigla" @if (isset($dados['visualizar'])) {{'readonly'}} @endif value='@if(isset($dados['estado'])){{$dados['estado']->sigla}}@endif' >
<br>
@if(!isset($dados['visualizar']))
    <button type="submit">Enviar</button>
@endif