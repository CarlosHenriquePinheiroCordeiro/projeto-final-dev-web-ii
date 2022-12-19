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
use Illuminate\Support\Facades\DB;

class SalaVirtualController extends Controller
{

    /**
     * Valida o privilégio de acesso à página
     */
    private function validaPrivilegio($rotinaValido) {
        if (!$this->permiteAcao()) {
            return redirect()->route('login');
        }
        return $rotinaValido;
    }

    /**
     * Retorna se a ação é permitida pelo usuário atual
     */
    private function permiteAcao() {
        return session()->all()['tipo_usuario_id'] != 3;
    }

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
            $busca = request('find').'%';
            $dados = SalaVirtual::where('nome', 'like', "$busca%")->orderBy('nome')->paginate(5);
            if (session()->all()['tipo_usuario_id'] == 2) {
                $dados = DB::table('sala_virtuals')->select(['sala_virtuals.*'])->join('sala_virtual_professors' , 'sala_virtual_professors.sala_virtual_id', '=', 'sala_virtuals.id')->join('pessoas', 'pessoas.id', '=', 'sala_virtual_professors.pessoa_id')->whereRaw('pessoas.id = '. session()->all()['pessoa_id'].' and sala_virtuals.nome like "'.$busca.'"')->orderBy('sala_virtuals.nome')->paginate(5);
            }
            if (session()->all()['tipo_usuario_id'] == 3) {
                $dados = DB::table('sala_virtuals')->select(['sala_virtuals.*'])->join('sala_virtual_alunos' , 'sala_virtual_alunos.sala_virtual_id', '=', 'sala_virtuals.id')->join('pessoas', 'pessoas.id', '=', 'sala_virtual_alunos.pessoa_id')->whereRaw('pessoas.id = '. session()->all()['pessoa_id'].' and sala_virtuals.nome like "'.$busca.'"')->orderBy('sala_virtuals.nome')->paginate(5);
            }
        }
        else {
            $dados = SalaVirtual::paginate(5);
            if (session()->all()['tipo_usuario_id'] == 2) {
                $dados = DB::table('sala_virtuals')->select(['sala_virtuals.*'])->join('sala_virtual_professors' , 'sala_virtual_professors.sala_virtual_id', '=', 'sala_virtuals.id')->join('pessoas', 'pessoas.id', '=', 'sala_virtual_professors.pessoa_id')->where('pessoas.id', '=', session()->all()['pessoa_id'])->orderBy('sala_virtuals.nome')->paginate(5);
            }
            if (session()->all()['tipo_usuario_id'] == 3) {
                $dados = DB::table('sala_virtuals')->select(['sala_virtuals.*'])->join('sala_virtual_alunos' , 'sala_virtual_alunos.sala_virtual_id', '=', 'sala_virtuals.id')->join('pessoas', 'pessoas.id', '=', 'sala_virtual_alunos.pessoa_id')->where('pessoas.id', '=', session()->all()['pessoa_id'])->orderBy('sala_virtuals.nome')->paginate(5);
            }
        }
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
        
        return $this->validaPrivilegio(view('salaVirtual.create', compact('dados')));
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
        if ($this->permiteAcao()) {
            $SalaVirtual = new SalaVirtual();
            $SalaVirtual->id            = $request->id;
            $SalaVirtual->nome          = $request->nome;
            $SalaVirtual->descricao     = $request->descricao;
            $SalaVirtual->disciplina_id = $request->disciplina_id;
            $SalaVirtual->save();

            foreach ($request->professor_id as $pessoa_id) {
                $SalaVirtualProfessor = new SalaVirtualProfessor();
                $SalaVirtualProfessor->pessoa_id        = $pessoa_id;
                $SalaVirtualProfessor->sala_virtual_id  = $SalaVirtual->id;
                $SalaVirtualProfessor->ativo            = 1;
                $SalaVirtualProfessor->save();
            }

            foreach ($request->aluno_id as $pessoa_id) {
                $SalaVirtualAluno = new SalaVirtualAluno();
                $SalaVirtualAluno->pessoa_id       = $pessoa_id;
                $SalaVirtualAluno->sala_virtual_id = $SalaVirtual->id;
                $SalaVirtualAluno->ativo           = 1;
                $SalaVirtualAluno->save();
            }
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
        foreach (DB::table('sala_virtual_professors')->select('pessoa_id')->whereRaw('sala_virtual_id = '.$salaVirtual.' and ativo = '.'1')->get() as $salaProfessor) {
            $professores[] = $salaProfessor->pessoa_id;
        }
        return $professores;
    }

    /**
     * Retorna os alunos da sala virtual
     */
    protected function getAlunosSala($salaVirtual) {
        $alunos = [];
        foreach (DB::table('sala_virtual_alunos')->select('pessoa_id')->whereRaw('sala_virtual_id = '.$salaVirtual.' and ativo = '.'1')->get() as $salaAluno) {
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
        return $this->validaPrivilegio(view('salaVirtual.edit', compact('dados')));
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
        if ($this->permiteAcao()) {
            $salaVirtual->id            = $request->id;
            $salaVirtual->nome          = $request->nome;
            $salaVirtual->descricao     = $request->descricao;
            $salaVirtual->disciplina_id = $request->disciplina_id;
            $salaVirtual->update();

            DB::update('update sala_virtual_professors set ativo = ? where sala_virtual_id = ?', ['0', $salaVirtual->id]);
            DB::update('update sala_virtual_alunos     set ativo = ? where sala_virtual_id = ?', ['0', $salaVirtual->id]);
            foreach ($request->professor_id ? $request->professor_id : [] as $pessoa_id) {
                $SalaVirtualProfessor = new SalaVirtualProfessor();
                $SalaVirtualProfessor->pessoa_id = $pessoa_id;
                $SalaVirtualProfessor->sala_virtual_id = $salaVirtual->id;
                if (SalaVirtualProfessor::where('sala_virtual_id', '=', $salaVirtual->id)->where('pessoa_id', '=', $pessoa_id)->first() == null) {
                    $SalaVirtualProfessor->ativo = 1;
                    $SalaVirtualProfessor->save();
                }
                else {
                    DB::update('update sala_virtual_professors set ativo = ? where sala_virtual_id = ? and pessoa_id = ?', ['1', $salaVirtual->id, $pessoa_id]);
                }
            }

            foreach ($request->aluno_id ? $request->aluno_id : [] as $pessoa_id) {
                $SalaVirtualAluno = new SalaVirtualAluno();
                $SalaVirtualAluno->pessoa_id = $pessoa_id;
                $SalaVirtualAluno->sala_virtual_id = $salaVirtual->id;
                if (SalaVirtualAluno::where('sala_virtual_id', '=', $salaVirtual->id)->where('pessoa_id', '=', $pessoa_id)->first() == null) {
                    $SalaVirtualAluno->ativo = 1;
                    $SalaVirtualAluno->save();
                }
                else {
                    DB::update('update sala_virtual_alunos set ativo = ? where sala_virtual_id = ? and pessoa_id = ?', ['1', $salaVirtual->id, $pessoa_id]);
                }
            }
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
        if ($this->permiteAcao())
            SalaVirtual::destroy($salaVirtual->id);
        return redirect()->route('salaVirtual.index');
    }
}