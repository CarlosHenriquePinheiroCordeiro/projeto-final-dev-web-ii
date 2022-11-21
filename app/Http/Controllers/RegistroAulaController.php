<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use App\Models\Professor;
use App\Models\RegistroAula;
use App\Models\SalaVirtual;
use App\Models\SalaVirtualProfessor;
use Illuminate\Http\Request;

class RegistroAulaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = array();
        if (request('salaVirtual') != null)
        {
            $busca = request('salaVirtual');
            $dados = RegistroAula::where('sala_virtual_id', '=', request('salaVirtual'))->paginate(5);
        }
        else
            $dados = RegistroAula::paginate(5);
        return view('registroAula.index', compact('dados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dados = [
            'insert'        => true,
            'professores'   => $this->getProfessoresSala(request('salaVirtual'))
        ];
        return view('registroAula.create', compact('dados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $RegistroAula = new RegistroAula();
        $RegistroAula->id               = $request->id;
        $RegistroAula->descricao        = $request->descricao;
        $RegistroAula->data             = $request->data;
        $RegistroAula->qtd_aula         = $request->qtd_aula;
        $RegistroAula->sala_virtual_id  = $request->sala_virtual_id;
        $RegistroAula->pessoa_id        = $request->pessoa_id;
        $RegistroAula->save();
        return redirect()->route('registroAula.index', ['salaVirtual' => $request->sala_virtual_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegistroAula  $registroAula
     * @return \Illuminate\Http\Response
     */
    public function show(RegistroAula $registroAula)
    {
        $dados = [
            'registroAula'      => $registroAula,
            'visualizar'        => true,
            'professores'       => $this->getProfessoresSala($registroAula->sala_virtual_id)
        ];
        return view('registroAula.show', compact('dados'));
    }

    /**
     * Retora os professores da sala virtual
     */
    protected function getProfessoresSala($salaVirtual) {
        $professores = [];
        foreach (SalaVirtualProfessor::where('sala_virtual_id', '=', $salaVirtual)->get() as $salaProfessor) {
            $professores[$salaProfessor->pessoa_id] = Pessoa::find($salaProfessor->pessoa_id)->get()[0]->nome;
        }
        return $professores;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegistroAula  $registroAula
     * @return \Illuminate\Http\Response
     */
    public function edit(RegistroAula $registroAula)
    {
        $dados = [
            'registroAula'  => $registroAula,
            'insert'        => true,
            'professores'   => $this->getProfessoresSala($registroAula->sala_virtual_id)
        ];
        return view('registroAula.edit', compact('dados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RegistroAula  $registroAula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegistroAula $registroAula)
    {
        $registroAula->id               = $request->id;
        $registroAula->descricao        = $request->descricao;
        $registroAula->data             = $request->data;
        $registroAula->qtd_aula         = $request->qtd_aula;
        $registroAula->sala_virtual_id  = $request->sala_virtual_id;
        $registroAula->pessoa_id        = $request->pessoa_id;
        $registroAula->update();
        return redirect()->route('registroAula.index', ['salaVirtual' => $request->sala_virtual_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegistroAula  $registroAula
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegistroAula $registroAula)
    {
        RegistroAula::destroy($registroAula->id);
        return redirect()->route('registroAula.index', ['salaVirtual' => $registroAula->sala_virtual_id]);
    }
}
