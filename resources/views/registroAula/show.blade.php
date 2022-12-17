@extends('registroAula.layout')

@section('titulo', 'Visualizar registro de aula')

@section('conteudo')
    @include('registroAula.form')
    <form action="{{route('registroAulaAluno.show', $dados['registroAula']->id)}}" method="get">
        <input type="hidden" name="registroAula" id="registroAula" value={{$dados['registroAula']->id}}>
        <input type="hidden" name="salaVirtual" id="salaVirtual" value={{$dados['registroAula']->sala_virtual_id}}>
        <input type="hidden" name="qtdAula" id="qtdAula" value={{$dados['registroAula']->qtd_aula}}>
        <button class="btn btn-outline-primary" type="submit">Visualizar presenças</button>
    </form>
@endsection