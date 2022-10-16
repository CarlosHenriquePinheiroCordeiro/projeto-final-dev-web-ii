<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Disciplina;
use App\Models\Pessoa;
use App\Models\Professor;
use App\Models\SalaVirtual;
use App\Models\SalaVirtualAluno;
use App\Models\SalaVirtualProfessor;
use Illuminate\Http\Request;

class SalaVirtualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = array();
        if (request('find') != null)
        {
            $busca = request('find');
            $dados = SalaVirtual::where('nome', 'like', "$busca%")->get();
        }
        else
            $dados = SalaVirtual::all();
        return view('salaVirtual.index', compact('dados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dados = [
            'insert'      => true,
            'disciplinas' => Disciplina::all(),
            'professores' => $this->getProfessores(),
            'alunos'      => $this->getAlunos()
        ];
        return view('salaVirtual.create', compact('dados'));
    }

    /**
     * Retorna os professores para a lista de NxN para a sala virtual
     */
    protected function getProfessores() {
        $professores = [];
        foreach (Professor::all() as $professor) {
            $professores[$professor->pessoa_id] = Pessoa::where('id', '=', $professor->pessoa_id)->get()[0]->nome;
        }
        return $professores;
    }

     /**
     * Retorna os professores para a lista de NxN para a sala virtual
     */
    protected function getAlunos() {
        $alunos = [];
        foreach (Aluno::all() as $aluno) {
            $alunos[$aluno->pessoa_id] = Pessoa::where('id', '=', $aluno->pessoa_id)->get()[0]->nome;
        }
        return $alunos;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $SalaVirtual = new SalaVirtual();
        $SalaVirtual->id            = $request->id;
        $SalaVirtual->nome          = $request->nome;
        $SalaVirtual->descricao     = $request->descricao;
        $SalaVirtual->disciplina_id = $request->disciplina_id;
        $SalaVirtual->save();

        foreach ($request->professor_id as $pessoa_id) {
            $SalaVirtualProfessor = new SalaVirtualProfessor();
            $SalaVirtualProfessor->pessoa_id = $pessoa_id;
            $SalaVirtualProfessor->sala_virtual_id = $SalaVirtual->id;
            $SalaVirtualProfessor->save();
        }

        foreach ($request->aluno_id as $pessoa_id) {
            $SalaVirtualAluno = new SalaVirtualAluno();
            $SalaVirtualAluno->pessoa_id = $pessoa_id;
            $SalaVirtualAluno->sala_virtual_id = $SalaVirtual->id;
            $SalaVirtualAluno->save();
        }
        return redirect()->route('salaVirtual.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SalaVirtual  $salaVirtual
     * @return \Illuminate\Http\Response
     */
    public function show(SalaVirtual $salaVirtual)
    {
        $dados = [
            'salaVirtual' => $salaVirtual,
            'visualizar' => true, 
            'disciplinas' => Disciplina::all(),
            'professores' => $this->getProfessores(),
            'alunos'      => $this->getAlunos(),
            'professoresSala' => $this->getProfessoresSala($salaVirtual->id),
            'alunosSala' => $this->getAlunosSala($salaVirtual->id)
        ];
        return view('salaVirtual.show', compact('dados'));
    }

    /**
     * Retora os professores da sala virtual
     */
    protected function getProfessoresSala($salaVirtual) {
        $professores = [];
        foreach (SalaVirtualProfessor::where('sala_virtual_id', '=', $salaVirtual)->get() as $salaProfessor) {
            $professores[] = $salaProfessor->pessoa_id;
        }
        return $professores;
    }

    /**
     * Retorna os alunos da sala virtual
     */
    protected function getAlunosSala($salaVirtual) {
        $alunos = [];
        foreach (SalaVirtualAluno::where('sala_virtual_id', '=', $salaVirtual)->get() as $salaAluno) {
            $alunos[] = $salaAluno->pessoa_id;
        }
        return $alunos;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalaVirtual  $salaVirtual
     * @return \Illuminate\Http\Response
     */
    public function edit(SalaVirtual $salaVirtual)
    {
        $dados = [
            'salaVirtual' => $salaVirtual,
            'insert' => true,
            'disciplinas' => Disciplina::all(),
            'professores' => $this->getProfessores(),
            'alunos'      => $this->getAlunos(),
            'professoresSala' => $this->getProfessoresSala($salaVirtual->id),
            'alunosSala' => $this->getAlunosSala($salaVirtual->id)
        ];
        return view('salaVirtual.edit', compact('dados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SalaVirtual  $salaVirtual
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalaVirtual $salaVirtual)
    {
        $salaVirtual->id            = $request->id;
        $salaVirtual->nome          = $request->nome;
        $salaVirtual->descricao     = $request->descricao;
        $salaVirtual->disciplina_id = $request->disciplina_id;
        $salaVirtual->update();

        SalaVirtualProfessor::where('sala_virtual_id', '=', $salaVirtual->id)->delete();
        foreach ($request->professor_id as $pessoa_id) {
            $SalaVirtualProfessor = new SalaVirtualProfessor();
            $SalaVirtualProfessor->pessoa_id = $pessoa_id;
            $SalaVirtualProfessor->sala_virtual_id = $salaVirtual->id;
            $SalaVirtualProfessor->save();
        }

        SalaVirtualAluno::where('sala_virtual_id', '=', $salaVirtual->id)->delete();
        foreach ($request->aluno_id as $pessoa_id) {
            $SalaVirtualAluno = new SalaVirtualAluno();
            $SalaVirtualAluno->pessoa_id = $pessoa_id;
            $SalaVirtualAluno->sala_virtual_id = $salaVirtual->id;
            $SalaVirtualAluno->save();
        }
        return redirect()->route('salaVirtual.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalaVirtual  $salaVirtual
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalaVirtual $salaVirtual)
    {
        SalaVirtual::destroy($salaVirtual->id);
        return redirect()->route('salaVirtual.index');
    }
}