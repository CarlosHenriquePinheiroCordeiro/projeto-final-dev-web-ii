@extends('salaVirtual.layout')

@section('titulo', 'Listar salas virtuais')

@section('conteudo')
    <h1>Sala Virtual</h1>
    <form action="{{route('salaVirtual.index')}}" method="get">
        <label for="find">Nome</label>
        <input type="text" id="find" name="find">
        <button type="submit">Consultar</button>
    </form>
    <table border="1">
        <th>ID</th><th>Nome</th><th>Descrição</th><th>Ação</th>
        @foreach ($dados as $salaVirtual)
        <tr>
            <td>{{$salaVirtual['id']}}</td>
            <td>{{$salaVirtual['nome']}}</td>
            <td>{{$salaVirtual['descricao']}}</td>
            <td>
                <form action="{{route('salaVirtual.edit', $salaVirtual['id'])}}" method="get">
                    <button type="submit">Editar</button>
                </form>
                <form action="{{route('salaVirtual.destroy', $salaVirtual['id'])}}" method="post" onsubmit="return confirm('Deseja excluir este registro?')">
                    @method("DELETE")
                    @csrf
                    <button type="submit">Excluir</button>
                </form>
                <form action="{{route('salaVirtual.show', $salaVirtual['id'])}}" method="get">
                    <button type="submit">Visualizar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection