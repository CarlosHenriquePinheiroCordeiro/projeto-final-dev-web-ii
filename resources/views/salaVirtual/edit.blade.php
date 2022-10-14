@extends('salaVirtual.layout')

@section('titulo', 'Editar sala virtual')

@section('conteudo')
    <form action="{{route('salaVirtual.update', $dados['salaVirtual']->id)}}" method="post">
        @method("PATCH")
        @include('salaVirtual.form')
    </form>
@endsection