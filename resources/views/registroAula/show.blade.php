@extends('registroAula.layout')

@section('titulo', 'Visualizar registro de aula')

@section('conteudo')
    @include('registroAula.form')
    @if (session()->all()['tipo_usuario_id'] != 3)
        <form action="{{route('registroAulaAluno.show', $dados['registroAula']->id)}}" method="get">
            <input type="hidden" name="registroAula" id="registroAula" value={{$dados['registroAula']->id}}>
            <input type="hidden" name="salaVirtual" id="salaVirtual" value={{$dados['registroAula']->sala_virtual_id}}>
            <input type="hidden" name="qtd_aula" id="qtd_aula" value={{$dados['registroAula']->qtd_aula}}>
            <button class="btn btn-outline-primary" type="submit">Visualizar presenças</button>
        </form>
    @endif
@endsection