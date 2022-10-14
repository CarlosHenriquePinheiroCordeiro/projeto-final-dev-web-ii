@extends('salaVirtual.layout')

@section('titulo', 'Incluir sala virtual')

@section('conteudo')
    <form action="{{ route('salaVirtual.store')}}" method="post">
        @method("POST")
        @include('salaVirtual.form')
    </form>
@endsection
