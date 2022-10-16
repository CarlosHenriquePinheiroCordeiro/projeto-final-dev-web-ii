@extends('usuario.layout')

@section('titulo', 'Incluir usuário')

@section('conteudo')
    <form action="{{ route('usuario.store')}}" method="post">
        @method("POST")
        @include('usuario.form')
    </form>
@endsection
