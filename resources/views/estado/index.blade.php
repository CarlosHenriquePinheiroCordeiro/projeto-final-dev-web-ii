@extends('estado.layout')

@section('titulo', 'Listar estados')

@section('conteudo')
    <h1>Estado</h1>
    <form action="{{route('estado.index')}}" method="get">
        <label for="find">Nome</label>
        <input type="text" id="find" name="find">
        <button type="submit" class="btn btn-secondary">Consultar</button>
    </form>
    <table border="1" class="table table-stripped">
        <th>ID</th><th>Nome</th><th>Sigla</th><th>Ação</th>
        @foreach ($dados as $estado)
        <tr>
            <td>{{$estado['id']}}</td>
            <td>{{$estado['nome']}}</td>
            <td>{{$estado['sigla']}}</td>
            <td>
                <form action="{{route('estado.edit', $estado['id'])}}" method="get">
                    <button type="submit">Editar</button>
                </form>
                <form action="{{route('estado.destroy', $estado['id'])}}" method="post" onsubmit="return confirm('Deseja excluir este registro?')">
                    @method("DELETE")
                    @csrf
                    <button type="submit">Excluir</button>
                </form>
                <form action="{{route('estado.show', $estado['id'])}}" method="get">
                    <button type="submit">Visualizar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{$dados->links()}}
@endsection