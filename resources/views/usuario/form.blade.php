@if(!isset($dados['visualizar']))
    @csrf
@endif

<h2>Dados do Usuário:</h2>
<label for="id">ID</label>
<input type="number" name="id" id="id" @if (isset($dados['visualizar']) || isset($dados['insert'])) {{'readonly'}} @endif value=@if(isset($dados['usuario'])){{$dados['usuario']->id}} @endif >
<br>
<label for="email">Email</label>
<input type="mail" required name="email" id="email" @if (isset($dados['visualizar'])) {{'readonly'}} @endif value='@if(isset($dados['usuario'])){{$dados['usuario']->usuario}}@endif'  >
<br>
<label for="senha">Senha</label>
<input required name="senha" id="senha" @if (isset($dados['visualizar'])) {{'readonly'}} @endif value='@if(isset($dados['usuario'])){{$dados['usuario']->senha}}@endif'  >
<br>
<label for="tipo_usuario_id">Tipo de Usuário</label>
<select name="tipo_usuario_id" id="tipo_usuario_id" @if (isset($dados['visualizar']) || isset($dados['immutable'])) {{'disabled'}} @endif >
    @foreach ($dados['tipo_usuarios'] as $tipoUsuario)
        <option @if (isset($dados['usuario']) && ($dados['usuario']->tipo_usuario_id == $tipoUsuario->id)) {{'selected'}} @endif value={{$tipoUsuario->id}} >{{$tipoUsuario->nome}}</option>
    @endforeach
</select>
<hr>
<h2>Dados da Pessoa:</h2>
<label for="id">ID</label>
<input required name="id" id="id" @if (isset($dados['visualizar']) || isset($dados['insert'])) {{'readonly'}} @endif value='@if(isset($dados['pessoa'])){{$dados['pessoa']->id}}@endif'  >
<br>
<label for="nome">Nome</label>
<input required name="nome" id="nome" @if (isset($dados['visualizar'])) {{'readonly'}} @endif value='@if(isset($dados['pessoa'])){{$dados['pessoa']->nome}}@endif'  >
<br>
<label for="data_nascimento">Data de Nascimento</label>
<input required type="date" name="data_nascimento" id="data_nascimento" @if (isset($dados['visualizar'])) {{'readonly'}} @endif value='@if(isset($dados['pessoa'])){{$dados['pessoa']->data_nascimento}}@endif'  >
<br>
<label for="cpf">CPF</label>
<input type="number" size="11" name="cpf" id="cpf" @if (isset($dados['visualizar'])) {{'readonly'}} @endif value='@if(isset($dados['pessoa'])){{$dados['pessoa']->cpf}}@endif'  >
<br>
<label for="rg">RG</label>
<input type="number" size="7" name="rg" id="rg" @if (isset($dados['visualizar'])) {{'readonly'}} @endif value='@if(isset($dados['pessoa'])){{$dados['pessoa']->rg}}@endif'  >
<br>
@if(!isset($dados['visualizar']))
    <button class="btn btn-outline-primary" type="submit">Enviar</button>
@endif