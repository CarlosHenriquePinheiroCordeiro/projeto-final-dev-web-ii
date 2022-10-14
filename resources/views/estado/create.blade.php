@extends('estado.layout')

@section('titulo', 'Incluir estado')

@section('conteudo')
    <form action="{{ route('estado.store')}}" method="post">
        @method("POST")
        @include('estado.form')
    </form>
@endsection
