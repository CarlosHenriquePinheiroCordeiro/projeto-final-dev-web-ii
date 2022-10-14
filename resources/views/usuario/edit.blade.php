@extends('usuario.layout')

@section('titulo', 'Editar usuário')

@section('conteudo')
    <form action="{{route('usuario.update', $dados['usuario']->id)}}" method="post">
        @method("PATCH")
        @include('usuario.form')
    </form>
@endsection