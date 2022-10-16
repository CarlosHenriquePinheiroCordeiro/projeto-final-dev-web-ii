@extends('endereco.layout')

@section('titulo', 'Editar endereço')

@section('conteudo')
    <form action="{{route('endereco.update', $dados['endereco']->pessoa_id)}}" method="post">
        @method("PATCH")
        @include('endereco.form')
    </form>
@endsection