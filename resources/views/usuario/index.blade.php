@extends('usuario.layout')

@section('titulo', 'Listar usuario')

@section('conteudo')
    <h1>Usuários</h1>
    <form action="{{route('usuario.index')}}" method="get">
        <label for="find">Nome</label>
        <input type="text" id="find" name="find">
        <button type="submit">Consultar</button>
    </form>
    <table border="1">
        <th>ID</th><th>Nome</th><th>Data de Nascimento</th><th>Ação</th>
        @foreach ($dados as $pessoa)
        <tr>
            <td>{{$pessoa['id']}}</td>
            <td>{{$pessoa['nome']}}</td>
            <td>{{$pessoa['data_nascimento']}}</td>
            <td>
                <form action="{{route('usuario.edit', $pessoa['usuario_id'])}}" method="get">
                    <button type="submit">Editar</button>
                </form>
                <form action="{{route('usuario.destroy', $pessoa['usuario_id'])}}" method="post" onsubmit="return confirm('Deseja excluir este registro?')">
                    @method("DELETE")
                    @csrf
                    <button type="submit">Excluir</button>
                </form>
                <form action="{{route('usuario.show', $pessoa['usuario_id'])}}" method="get">
                    <button type="submit">Visualizar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection