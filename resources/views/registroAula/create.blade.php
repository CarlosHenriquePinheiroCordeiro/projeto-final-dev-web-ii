@extends('registroAula.layout')

@section('titulo', 'Incluir registro de aula')

@section('conteudo')
    <form action="{{ route('registroAula.store')}}" method="post">
        @method("POST")
        @include('registroAula.form')
    </form>
@endsection
