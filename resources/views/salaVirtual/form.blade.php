@if(!isset($dados['visualizar']))
    @csrf
@endif
<label for="id">ID</label>
<input type="number" name="id" id="id" @if (isset($dados['visualizar']) || isset($dados['insert'])) {{'readonly'}} @endif value=@if(isset($dados['salaVirtual'])) {{$dados['salaVirtual']->id}} @endif >
<br>
<label for="nome">Nome</label>
<input required name="nome" id="nome" @if (isset($dados['visualizar'])) {{'readonly'}} @endif value='@if(isset($dados['salaVirtual'])){{$dados['salaVirtual']->nome}}@endif'  >
<br>
<label for="descricao">Descrição</label>
<input required name="descricao" id="descricao" @if (isset($dados['visualizar'])) {{'readonly'}} @endif value='@if(isset($dados['salaVirtual'])){{$dados['salaVirtual']->descricao}}@endif'  >
<br>
<label for="disciplina_id">Disciplina</label>
<select required name="disciplina_id" id="disciplina_id" @if (isset($dados['visualizar'])) {{'disabled'}} @endif >
    @foreach ($dados['disciplinas'] as $disciplina)
        <option @if (isset($dados['salaVirtual']) && ($dados['salaVirtual']->disciplina_id == $disciplina->id)) {{'selected'}} @endif value={{$disciplina->id}} >{{$disciplina->nome}}</option>
    @endforeach
</select>
<br>
<hr>
<h2>Professores da Sala Virtual</h2>
@foreach ($dados['professores'] as $professor_pessoa_id => $professor_pessoa_nome)
    {{$professor_pessoa_nome}} <input type="checkbox" name="professor_id[]" id="professor_id[]" @if (isset($dados['visualizar'])) {{'disabled'}} @endif  @if (isset($dados['professoresSala']) && in_array($professor_pessoa_id, $dados['professoresSala'])) {{'checked'}} @endif value={{$professor_pessoa_id}}>
    <br>
@endforeach
<hr>
<h2>Alunos da Sala Virtual</h2>
@foreach ($dados['alunos'] as $aluno_pessoa_id => $aluno_pessoa_nome)
    {{$aluno_pessoa_nome}} <input type="checkbox" name="aluno_id[]" id="aluno_id[]" @if (isset($dados['visualizar'])) {{'disabled'}} @endif @if (isset($dados['visualizar'])) {{'disabled'}} @endif  @if (isset($dados['professoresSala']) && in_array($aluno_pessoa_id, $dados['alunosSala'])) {{'checked'}} @endif value={{$aluno_pessoa_id}}>
    <br>
@endforeach
<hr>
@if(!isset($dados['visualizar']))
    <button type="submit">Enviar</button>
@endif