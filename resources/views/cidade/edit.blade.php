@extends('cidade.layout')

@section('titulo', 'Editar cidade')

@section('conteudo')
    <form action="{{route('cidade.update', $dados['cidade']->id)}}" method="post">
        @method("PATCH")
        @include('cidade.form')
    </form>
@endsection