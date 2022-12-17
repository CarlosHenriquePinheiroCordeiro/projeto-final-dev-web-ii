@if(!isset($dados['visualizar']))
    @csrf
@endif
<label for="id">ID</label>
<input type="number" name="id" id="id" @if (isset($dados['visualizar']) || isset($dados['insert'])) {{'readonly'}} @endif value=@if(isset($dados['disciplina'])) {{$dados['disciplina']->id}} @endif >
<br>
<label for="nome">Nome</label>
<input required name="nome" id="nome" @if (isset($dados['visualizar'])) {{'readonly'}} @endif value='@if(isset($dados['disciplina'])){{$dados['disciplina']->nome}}@endif'  >
<br>
<label for="descricao">Descrição</label>
<input required name="descricao" id="descricao" @if (isset($dados['visualizar'])) {{'readonly'}} @endif value='@if(isset($dados['disciplina'])){{$dados['disciplina']->descricao}}@endif' >
<br>
@if(!isset($dados['visualizar']))
    <button class="btn btn-outline-primary" type="submit">Enviar</button>
@endif