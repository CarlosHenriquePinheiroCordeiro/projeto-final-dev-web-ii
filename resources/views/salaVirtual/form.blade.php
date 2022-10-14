@if(!isset($dados['visualizar']))
    @csrf
@endif
<label for="id">ID</label>
<input type="number" name="id" id="id" @if (isset($dados['visualizar']) || isset($dados['insert'])) {{'readonly'}} @endif value=@if(isset($dados['salaVirtual'])) {{$dados['salaVirtual']->id}} @endif >
<br>
<label for="nome">Nome</label>
<input required name="nome" id="nome" @if (isset($dados['visualizar'])) {{'readonly'}} @endif value='@if(isset($dados['salaVirtual'])) {{$dados['salaVirtual']->nome}} @endif'  >
<br>
<label for="descricao">Descrição</label>
<input required name="descricao" id="descricao" @if (isset($dados['visualizar'])) {{'readonly'}} @endif value='@if(isset($dados['salaVirtual'])) {{$dados['salaVirtual']->descricao}} @endif'  >
<br>
<label for="materia_id">Matéria</label>
<select required name="materia_id" id="materia_id" @if (isset($dados['visualizar'])) {{'disabled'}} @endif >
    @foreach ($dados['materias'] as $materia)
        <option @if (isset($dados['salaVirtual']) && ($dados['salaVirtual']->materia_id == $materia->id)) {{'selected'}} @endif value={{$materia->id}} >{{$materia->nome}}</option>
    @endforeach
</select>
<br>
@if(!isset($dados['visualizar']))
    <button type="submit">Enviar</button>
@endif