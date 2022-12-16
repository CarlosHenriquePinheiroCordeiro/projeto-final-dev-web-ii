@extends('registroAula.layout')

@section('titulo', 'Editar registro de aula')

@section('conteudo')
    <form action="{{route('registroAula.update', $dados['registroAula']->id)}}" method="post">
        @method("PATCH")
        @include('registroAula.form')
        <button type="submit">Enviar</button>
    </form>
    <form action="{{route('registroAulaAluno.edit', $dados['registroAula']->id)}}" method="get">
        <input type="hidden" name="registroAula" id="registroAula" value={{$dados['registroAula']->id}}>
        <input type="hidden" name="salaVirtual" id="salaVirtual" value={{$dados['registroAula']->sala_virtual_id}}>
        <input type="hidden" name="qtdAula" id="qtdAula" value={{$dados['registroAula']->qtd_aula}}>
        <button type="submit">Editar presenças</button>
    </form>
@endsection