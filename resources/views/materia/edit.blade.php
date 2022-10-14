@extends('materia.layout')

@section('titulo', 'Editar matéria')

@section('conteudo')
    <form action="{{route('materia.update', $dados['materia']->id)}}" method="post">
        @method("PATCH")
        @include('materia.form')
    </form>
@endsection