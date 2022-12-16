@extends('cidade.layout')

@section('titulo', 'Listar cidades')

@section('conteudo')
    <h1>Cidade</h1>
    <form action="{{route('cidade.index')}}" method="get">
        <label for="find">Nome</label>
        <input type="text" id="find" name="find">
        <button type="submit" class="btn btn-secondary">Consultar</button>
    </form>
    <br>
    <form action="{{route('cidade.create')}}" method="get">
        <button type="submit" class="btn btn-primary">Incluir</button>
    </form>
    <br>
    <table border="1" class="table table-stripped">
        <th>ID</th><th>Nome</th><th>Ação</th>
        @foreach ($dados as $cidade)
        <tr>
            <td>{{$cidade['id']}}</td>
            <td>{{$cidade['nome']}}</td>
            <td>
                <form action="{{route('cidade.edit', $cidade['id'])}}" method="get">
                    <button type="submit">Editar</button>
                </form>
                <form action="{{route('cidade.destroy', $cidade['id'])}}" method="post" onsubmit="return confirm('Deseja excluir este registro?')">
                    @method("DELETE")
                    @csrf
                    <button type="submit">Excluir</button>
                </form>
                <form action="{{route('cidade.show', $cidade['id'])}}" method="get">
                    <button type="submit">Visualizar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{$dados->links()}}
@endsection