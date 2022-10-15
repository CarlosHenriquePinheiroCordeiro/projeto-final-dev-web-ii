@extends('disciplina.layout')

@section('titulo', 'Editar disciplina')

@section('conteudo')
    <form action="{{route('disciplina.update', $dados['disciplina']->id)}}" method="post">
        @method("PATCH")
        @include('disciplina.form')
    </form>
@endsection