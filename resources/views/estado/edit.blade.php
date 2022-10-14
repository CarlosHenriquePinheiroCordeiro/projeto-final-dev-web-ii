@extends('estado.layout')

@section('titulo', 'Editar estado')

@section('conteudo')
    <form action="{{route('estado.update', $dados['estado']->id)}}" method="post">
        @method("PATCH")
        @include('estado.form')
    </form>
@endsection