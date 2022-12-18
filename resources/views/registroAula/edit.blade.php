@extends('registroAula.layout')

@section('titulo', 'Editar registro de aula')

@section('conteudo')
    <form action="{{route('registroAula.update', $dados['registroAula']->id)}}" method="post">
        @method("PATCH")
        @include('registroAula.form')
    </form>
    <form action="{{route('registroAulaAluno.edit', $dados['registroAula']->id)}}" method="get">
        <input type="hidden" name="registroAula" id="registroAula" value={{$dados['registroAula']->id}}>
        <input type="hidden" name="salaVirtual" id="salaVirtual" value={{$dados['registroAula']->sala_virtual_id}}>
        <input type="hidden" name="qtd_aula" id="qtd_aula" value={{$dados['registroAula']->qtd_aula}}>
        <button class="btn btn-outline-warning" type="submit">Editar presenças</button>
    </form>
@endsection