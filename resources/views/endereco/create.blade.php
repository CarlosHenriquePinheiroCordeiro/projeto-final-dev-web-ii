@extends('endereco.layout')

@section('titulo', 'Incluir endereço')

@section('conteudo')
    <form action="{{ route('endereco.store')}}" method="post">
        @method("POST")
        @include('endereco.form')
    </form>
@endsection
