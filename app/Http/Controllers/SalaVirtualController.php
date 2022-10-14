<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\SalaVirtual;
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
        $dados = ['insert' => true, 'materias' => Materia::all()];
        return view('salaVirtual.create', compact('dados'));
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
        $SalaVirtual->id         = $request->id;
        $SalaVirtual->nome       = $request->nome;
        $SalaVirtual->descricao  = $request->descricao;
        $SalaVirtual->materia_id = $request->materia_id;
        $SalaVirtual->save();
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
        $dados = ['salaVirtual' => $salaVirtual, 'visualizar' => true, 'materias' => Materia::all()];
        return view('salaVirtual.show', compact('dados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalaVirtual  $salaVirtual
     * @return \Illuminate\Http\Response
     */
    public function edit(SalaVirtual $salaVirtual)
    {
        $dados = ['salaVirtual' => $salaVirtual, 'insert' => true, 'materias' => Materia::all()];
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
        $salaVirtual->id         = $request->id;
        $salaVirtual->nome       = $request->nome;
        $salaVirtual->descricao  = $request->descricao;
        $salaVirtual->materia_id = $request->materia_id;
        $salaVirtual->update();
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