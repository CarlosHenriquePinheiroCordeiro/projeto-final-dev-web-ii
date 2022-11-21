<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
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
            $dados = Disciplina::where('nome', 'like', "$busca%")->orderBy('nome')->paginate(5);
        }
        else
            $dados = Disciplina::paginate(5);
        return view('disciplina.index', compact('dados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dados = ['insert' => true];
        return view('disciplina.create', compact('dados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Disciplina = new Disciplina();
        $Disciplina->id         = $request->id;
        $Disciplina->nome       = $request->nome;
        $Disciplina->descricao  = $request->descricao;
        $Disciplina->save();
        return redirect()->route('disciplina.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function show(Disciplina $disciplina)
    {
        $dados = ['disciplina' => $disciplina, 'visualizar' => true];
        return view('disciplina.show', compact('dados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function edit(Disciplina $disciplina)
    {
        $dados = ['disciplina' => $disciplina, 'insert' => true];
        return view('disciplina.edit', compact('dados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Disciplina $disciplina)
    {
        $disciplina->id         = $request->id;
        $disciplina->nome       = $request->nome;
        $disciplina->descricao  = $request->descricao;
        $disciplina->update();
        return redirect()->route('disciplina.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disciplina $disciplina)
    {
        Disciplina::destroy($disciplina->id);
        return redirect()->route('disciplina.index');
    }
}
