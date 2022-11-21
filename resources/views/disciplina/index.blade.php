@extends('disciplina.layout')

@section('titulo', 'Listar disciplinas')

@section('conteudo')
    <h1>Disciplina</h1>
    <form action="{{route('disciplina.index')}}" method="get">
        <label for="find">Nome</label>
        <input type="text" id="find" name="find">
        <button type="submit" class="btn btn-secondary">Consultar</button>
    </form>
    <table border="1" class="table table-stripped">
        <th>ID</th><th>Nome</th><th>Descrição</th><th>Ação</th>
        @foreach ($dados as $disciplina)
        <tr>
            <td>{{$disciplina['id']}}</td>
            <td>{{$disciplina['nome']}}</td>
            <td>{{$disciplina['descricao']}}</td>
            <td>
                <form action="{{route('disciplina.edit', $disciplina['id'])}}" method="get">
                    <button type="submit">Editar</button>
                </form>
                <form action="{{route('disciplina.destroy', $disciplina['id'])}}" method="post" onsubmit="return confirm('Deseja excluir este registro?')">
                    @method("DELETE")
                    @csrf
                    <button type="submit">Excluir</button>
                </form>
                <form action="{{route('disciplina.show', $disciplina['id'])}}" method="get">
                    <button type="submit">Visualizar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{$dados->links()}}
@endsection