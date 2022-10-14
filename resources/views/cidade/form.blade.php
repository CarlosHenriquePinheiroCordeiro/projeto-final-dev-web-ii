@if(!isset($dados['visualizar']))
    @csrf
@endif
<label for="id">ID</label>
<input type="number" name="id" id="id" @if (isset($dados['visualizar']) || isset($dados['insert'])) {{'readonly'}} @endif value=@if(isset($dados['cidade'])) {{$dados['cidade']->id}} @endif >
<br>
<label for="nome">Nome</label>
<input name="nome" id="nome" @if (isset($dados['visualizar'])) {{'readonly'}} @endif value='@if(isset($dados['cidade'])) {{$dados['cidade']->nome}} @endif'  >
<br>
<label for="estado_id">Estado</label>
<select name="estado_id" id="estado_id" @if (isset($dados['visualizar'])) {{'disabled'}} @endif >
    @foreach ($dados['estados'] as $estado)
        <option @if (isset($dados['cidade']) && ($dados['cidade']->estado_id == $estado->id)) {{'selected'}} @endif value={{$estado->id}} >{{$estado->nome}}</option>
    @endforeach
</select>
<br>
@if(!isset($dados['visualizar']))
    <button type="submit">Enviar</button>
@endif