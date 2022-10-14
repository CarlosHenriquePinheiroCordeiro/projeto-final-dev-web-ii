@extends('materia.layout')

@section('titulo', 'Incluir Matéria')

@section('conteudo')
    <form action="{{ route('materia.store')}}" method="post">
        @method("POST")
        @include('materia.form')
    </form>
@endsection
