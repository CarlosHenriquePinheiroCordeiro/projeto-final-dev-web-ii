@extends('salaVirtual.layout')

@section('titulo', 'Listar salas virtuais')

@section('conteudo')
    <h1>Sala Virtual</h1>
    <form action="{{route('salaVirtual.index')}}" method="get">
        <label for="find">Nome</label>
        <input type="text" id="find" name="find">
        <button type="submit" class="btn btn-secondary">Consultar</button>
    </form>
    <table border="1" class="table table-stripped">
        <th>ID</th><th>Nome</th><th>Descrição</th><th>Ação</th>
        @foreach ($dados as $salaVirtual)
        <tr>
            <td>{{$salaVirtual['id']}}</td>
            <td>{{$salaVirtual['nome']}}</td>
            <td>{{$salaVirtual['descricao']}}</td>
            <td>
                <form action="{{route('registroAula.index')}}" method="get">
                    <input type="hidden" id="salaVirtual" name="salaVirtual" value={{$salaVirtual['id']}}>
                    <button type="submit">Registros de Aula</button>
                </form>
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
    {{$dados->links()}}
@endsection