@extends('registroAulaAluno.layout')

@section('titulo', 'Incluir presenças para '.$dados['qtd_aula'].' aulas')

@section('conteudo')
    <form action="{{ route('registroAulaAluno.store')}}" method="post">
        @method("POST")
        @include('registroAulaAluno.form')
    </form>
@endsection
