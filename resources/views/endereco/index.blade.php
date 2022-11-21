@extends('endereco.layout')

@section('titulo', 'Listar endereços')

@section('conteudo')
    <h1>Endereço</h1>
    <form action="{{route('endereco.index')}}" method="get">
        <label for="find">Rua</label>
        <input type="text" id="find" name="find">
        <button type="submit" class="btn btn-secondary">Consultar</button>
    </form>
    <table border="1" class="table table-stripped">
        <th>Pessoa</th><th>Rua</th><th>Bairro</th><th>Número</th><th>Ação</th>
        @foreach ($dados as $endereco)
        <tr>
            <td>{{$endereco['pessoa_id']}}</td>
            <td>{{$endereco['rua']}}</td>
            <td>{{$endereco['bairro']}}</td>
            <td>{{$endereco['numero']}}</td>
            <td>
                <form action="{{route('endereco.edit', $endereco['pessoa_id'])}}" method="get">
                    <button type="submit">Editar</button>
                </form>
                <form action="{{route('endereco.destroy', $endereco['pessoa_id'])}}" method="post" onsubmit="return confirm('Deseja excluir este registro?')">
                    @method("DELETE")
                    @csrf
                    <button type="submit">Excluir</button>
                </form>
                <form action="{{route('endereco.show', $endereco['pessoa_id'])}}" method="get">
                    <button type="submit">Visualizar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{$dados->links()}}
@endsection