@extends('usuario.layout')

@section('titulo', 'Incluir sala virtual')

@section('conteudo')
    <form action="{{ route('usuario.store')}}" method="post">
        @method("POST")
        @include('usuario.form')
    </form>
@endsection
