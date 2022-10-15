@extends('disciplina.layout')

@section('titulo', 'Incluir disciplina')

@section('conteudo')
    <form action="{{ route('disciplina.store')}}" method="post">
        @method("POST")
        @include('disciplina.form')
    </form>
@endsection
