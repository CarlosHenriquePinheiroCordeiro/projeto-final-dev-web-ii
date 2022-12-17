@if(!isset($dados['visualizar']))
    @csrf
@endif
<input type="hidden" name="sala_virtual_id" id="sala_virtual_id" @if (isset($dados['visualizar']) || isset($dados['insert'])) {{'readonly'}} @endif value=@if(isset($dados['registroAula'])){{$dados['registroAula']->sala_virtual_id}}@else{{request('salaVirtual')}}@endif >
<br>
<label for="id">ID</label>
<input type="number" name="id" id="id" @if (isset($dados['visualizar']) || isset($dados['insert'])) {{'readonly'}} @endif value=@if(isset($dados['registroAula'])) {{$dados['registroAula']->id}} @endif >
<br>
<label for="descricao">Descrição</label>
<input required name="descricao" id="descricao" @if (isset($dados['visualizar'])) {{'readonly'}} @endif value='@if(isset($dados['registroAula'])){{$dados['registroAula']->descricao}}@endif'  >
<br>
<label for="data">Data</label>
<input type="date" required name="data" id="data" @if (isset($dados['visualizar'])) {{'readonly'}} @endif value='@if(isset($dados['registroAula'])){{$dados['registroAula']->data}}@endif'  >
<br>
<label for="qtd_aula">Quantidade de Aulas</label>
<input type="number" required name="qtd_aula" id="qtd_aula" @if (isset($dados['visualizar'])) {{'readonly'}} @endif value=@if(isset($dados['registroAula'])){{$dados['registroAula']->qtd_aula}}@endif  >
<br>
<label for="pessoa_id">Professor</label>
<select required name="pessoa_id" id="pessoa_id" @if (isset($dados['visualizar'])) {{'disabled'}} @endif >
    @foreach ($dados['professores'] as $professor_pessoa_id => $professor_pessoa_nome)
        <option @if (isset($dados['registroAula']) && $dados['registroAula']->pessoa_id == $professor_pessoa_id) {{'selected'}} @endif value={{$professor_pessoa_id}}>{{$professor_pessoa_nome}}</option>
    @endforeach
</select>
<br>
@if(!isset($dados['visualizar']))
    <button class="btn btn-outline-primary" type="submit">Enviar</button>
@endif