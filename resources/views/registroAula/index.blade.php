@extends('registroAula.layout')

@section('titulo', 'Listar registros de aula')

@section('conteudo')
    <h1>Registro de Aula</h1>
    <form action="{{route('registroAula.index')}}" method="get">
        <label for="find">Descrição</label>
        <input type="text" id="find" name="find">
        <button type="submit">Consultar</button>
    </form>
    <table border="1">
        <th>ID</th><th>Descrição</th><th>Data</th><th>Aulas</th><th>Ação</th>
        @foreach ($dados as $registroAula)
        <tr>
            <td>{{$registroAula['id']}}</td>
            <td>{{$registroAula['descricao']}}</td>
            <td>{{$registroAula['data']}}</td>
            <td>{{$registroAula['qtd_aula']}}</td>
            <td>
                <form action="{{route('registroAula.edit', $registroAula['id'])}}" method="get">
                    <button type="submit">Editar</button>
                </form>
                <form action="{{route('registroAula.destroy', $registroAula['id'])}}" method="post" onsubmit="return confirm('Deseja excluir este registro?')">
                    @method("DELETE")
                    @csrf
                    <button type="submit">Excluir</button>
                </form>
                <form action="{{route('registroAula.show', $registroAula['id'])}}" method="get">
                    <button type="submit">Visualizar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection