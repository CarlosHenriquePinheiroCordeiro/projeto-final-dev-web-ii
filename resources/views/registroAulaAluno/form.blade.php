@if(!isset($dados['visualizar']))
    @csrf
@endif
<input type="hidden" name="sala_virtual_id" id="sala_virtual_id" value={{$dados['salaVirtual']}}>
<input type="hidden" name="registro_aula_id" id="registro_aula_id" value={{$dados['registroAula']}}>
<br>
@foreach ($dados['alunos'] as $aluno_pessoa_id => $aluno_pessoa_nome)
<label for="pessoa_id[{{$aluno_pessoa_id}}]">{{$aluno_pessoa_nome}}</label>
<select required name="pessoa_id[{{$aluno_pessoa_id}}]" id="pessoa_id[{{$aluno_pessoa_id}}]" @if (isset($dados['visualizar'])) {{'disabled'}} @endif >
    @for ($i = $dados['qtd_aula_inicial']; $i < $dados['qtd_aula']; $i++)
        <option @if (isset($dados['registroAulaAluno']) && $dados['registroAulaAluno'][$aluno_pessoa_id] == $i+1) {{'selected'}} @endif value={{$i+1}}>{{$i+1}} Presença(s)</option>
    @endfor
</select>
@if (isset($dados['registroAulaAluno']) && isset($dados['aulasAntes'])) {{'antes '.$dados['registroAulaAluno'][$aluno_pessoa_id].' presença(s) com '.$dados['aulasAntes'].' aulas'}} @elseif (isset($dados['registroAulaAluno'])) {{'(antes '.$dados['registroAulaAluno'][$aluno_pessoa_id].' presenças)'}}  @endif
<br>
@endforeach
<br>
@if(!isset($dados['visualizar']))
    <button class="btn btn-outline-primary" type="submit">Enviar</button>
@endif