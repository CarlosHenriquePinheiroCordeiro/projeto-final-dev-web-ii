@extends('cidade.layout')

@section('titulo', 'Incluir cidade')

@section('conteudo')
    <form action="{{ route('cidade.store')}}" method="post">
        @method("POST")
        @include('cidade.form')
    </form>
@endsection
