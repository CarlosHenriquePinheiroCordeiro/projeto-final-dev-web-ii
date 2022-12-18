<?php

namespace App\Http\Controllers;

use App\Models\RegistroAula;
use App\Models\RegistroAulaAluno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistroAulaAlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dados = [
            'insert'            => true,
            'alunos'            => $this->getAlunosSala(request('salaVirtual')),
            'registroAula'      => request('registroAula'),
            'salaVirtual'       => request('salaVirtual'),
            'qtd_aula'          => request('qtdAula'),
            'qtd_aula_inicial'  => 0,
        ];
        return view('registroAulaAluno.create', compact('dados'));
    }

    /**
     * Retorna os alunos vinculados à sala virtual para listar a presença
     */
    protected function getAlunosSala($salaVirtual) {
        return DB::table('sala_virtual_alunos')->join('pessoas', 'sala_virtual_alunos.pessoa_id', '=', 'pessoas.id')
        ->selectRaw('pessoa_id, nome')->where('sala_virtual_id', '=', $salaVirtual)->pluck('pessoas.nome', 'pessoa_id');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->pessoa_id as $chaveAluno => $presencas) {
            $registroAulaAluno = new RegistroAulaAluno();
            $registroAulaAluno->registro_aula_id = $request->registro_aula_id;
            $registroAulaAluno->pessoa_id        = $chaveAluno;
            $registroAulaAluno->presenca         = $presencas;
            $registroAulaAluno->save();
        }
        return redirect()->route('registroAula.index', ['salaVirtual' => request('sala_virtual_id')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegistroAulaAluno  $registroAulaAluno
     * @return \Illuminate\Http\Response
     */
    public function show(RegistroAulaAluno $registroAulaAluno)
    {
        $dados = [
            'visualizar'        => true,
            'alunos'            => $this->getAlunosSala(request('salaVirtual')),
            'registroAula'      => request('registroAula'),
            'registroAulaAluno' => $this->getRegistrosPresenca(request('registroAula')),
            'salaVirtual'       => request('salaVirtual'),
            'qtd_aula'          => request('qtdAula')
        ];
        return view('registroAulaAluno.show', compact('dados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegistroAulaAluno  $registroAulaAluno
     * @return \Illuminate\Http\Response
     */
    public function edit(RegistroAulaAluno $registroAulaAluno)
    {
        $dados = [
            'alunos'            => $this->getAlunosSala(request('salaVirtual')),
            'registroAula'      => request('registroAula'),
            'registroAulaAluno' => $this->getRegistrosPresenca(request('registroAula')),
            'salaVirtual'       => request('salaVirtual'),
            'qtd_aula'          => request('qtd_aula'),
            'qtd_aula_inicial'  => 0,
            'aulasAntes'        => request('aulasAntes'),
        ];
        return view('registroAulaAluno.edit', compact('dados'));
    }

    /**
     * Retorna os registros de presença relacionados ao registro de aula
     */
    public function getRegistrosPresenca($registroAula) {
        return DB::table('registro_aula_alunos')->selectRaw('*')->where('registro_aula_id', '=', $registroAula)->pluck('presenca', 'pessoa_id');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RegistroAulaAluno  $registroAulaAluno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegistroAulaAluno $registroAulaAluno)
    {
        foreach (request('pessoa_id') as $pessoa_id => $presencas) {
            DB::update('update registro_aula_alunos set presenca = ? where registro_aula_id = ? and pessoa_id = ?', [$presencas, request('registro_aula_id'), $pessoa_id]);
        }
        return redirect()->route('registroAula.index', ['salaVirtual' => request('sala_virtual_id')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegistroAulaAluno  $registroAulaAluno
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegistroAulaAluno $registroAulaAluno)
    {
        //
    }
}
