<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listar Disciplinas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{route('disciplina.index')}}" method="get">
                    <label for="find">Nome</label>
                    <input type="text" id="find" name="find">
                    <button type="submit" class="btn btn-outline-secondary">Consultar</button>
                </form>
                <br>
                <form action="{{route('disciplina.create')}}" method="get">
                    <button type="submit" class="btn btn-outline-success">Incluir</button>
                </form>
                <br>
                <table border="1" class="table table-stripped">
                    <th>ID</th><th>Nome</th><th>Descrição</th><th>Ação</th>
                    @foreach ($dados as $disciplina)
                    <tr>
                        <td>{{$disciplina['id']}}</td>
                        <td>{{$disciplina['nome']}}</td>
                        <td>{{$disciplina['descricao']}}</td>
                        <td>
                            <form action="{{route('disciplina.edit', $disciplina['id'])}}" method="get">
                                <button class="btn btn-outline-warning" type="submit">Editar</button>
                            </form>
                            <form action="{{route('disciplina.destroy', $disciplina['id'])}}" method="post" onsubmit="return confirm('Deseja excluir este registro?')">
                                @method("DELETE")
                                @csrf
                                <button class="btn btn-outline-danger" type="submit">Excluir</button>
                            </form>
                            <form action="{{route('disciplina.show', $disciplina['id'])}}" method="get">
                                <button class="btn btn-outline-primary" type="submit">Visualizar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
                {{$dados->links()}}
            </div>
        </div>
    </div>
</x-app-layout>
