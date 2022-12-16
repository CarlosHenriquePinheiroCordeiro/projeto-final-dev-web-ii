@extends('registroAulaAluno.layout')

@section('titulo', 'Incluir presenças')

@section('conteudo')
    <form action="{{ route('registroAulaAluno.store')}}" method="post">
        @method("POST")
        @include('registroAulaAluno.form')
    </form>
@endsection
