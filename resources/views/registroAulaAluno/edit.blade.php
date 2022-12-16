@extends('registroAulaAluno.layout')

@section('titulo', 'Editar presença')

@section('conteudo')
    <form action="{{route('registroAulaAluno.update', $dados['registroAula'])}}" method="post">
    <input type="hidden" name="registro_aula_id" id="registro_aula_id" value={{$dados['registroAula']}}>
        @method("PATCH")
        @include('registroAulaAluno.form')
    </form>
@endsection