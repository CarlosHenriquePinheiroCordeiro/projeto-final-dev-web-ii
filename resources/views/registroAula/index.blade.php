@extends('registroAula.layout')

@section('titulo', 'Listar registros de aula')

@section('conteudo')
    <h1>Registro de Aula</h1>
    <form action="{{route('registroAula.index')}}" method="get">
        <label for="find">Descrição</label>
        <input type="text" id="find" name="find">
        <input type="hidden" id="salaVirtual" name="salaVirtual" value={{request('salaVirtual')}}>
        <button type="submit" class="btn btn-secondary">Consultar</button>
    </form>
    <br>
    <form action="{{route('registroAula.create')}}" method="get">
        <input type="hidden" id="salaVirtual" name="salaVirtual" value={{request('salaVirtual')}}>
        <button type="submit" class="btn btn-primary">Incluir</button>
    </form>
    <br>
    <table border="1" class="table table-stripped">
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
    {{$dados->links()}}
@endsection