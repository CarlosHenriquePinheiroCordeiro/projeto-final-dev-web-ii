@extends('registroAula.layout')

@section('titulo', 'Editar sala virtual')

@section('conteudo')
    <form action="{{route('registroAula.update', $dados['registroAula']->id)}}" method="post">
        @method("PATCH")
        @include('registroAula.form')
    </form>
@endsection