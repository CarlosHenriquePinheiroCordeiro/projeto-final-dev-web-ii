@extends('materia.layout')

@section('titulo', 'Listar matérias')

@section('conteudo')
    <h1>Matéria</h1>
    <form action="{{route('materia.index')}}" method="get">
        <label for="find">Nome</label>
        <input type="text" id="find" name="find">
        <button type="submit">Consultar</button>
    </form>
    <table border="1">
        <th>ID</th><th>Nome</th><th>Descrição</th><th>Ação</th>
        @foreach ($dados as $materia)
        <tr>
            <td>{{$materia['id']}}</td>
            <td>{{$materia['nome']}}</td>
            <td>{{$materia['descricao']}}</td>
            <td>
                <form action="{{route('materia.edit', $materia['id'])}}" method="get">
                    <button type="submit">Editar</button>
                </form>
                <form action="{{route('materia.destroy', $materia['id'])}}" method="post" onsubmit="return confirm('Deseja excluir este registro?')">
                    @method("DELETE")
                    @csrf
                    <button type="submit">Excluir</button>
                </form>
                <form action="{{route('materia.show', $materia['id'])}}" method="get">
                    <button type="submit">Visualizar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection