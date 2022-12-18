<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Estado;
use Illuminate\Http\Request;

class CidadeController extends Controller
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
        return session()->all()['tipo_usuario_id'] == 1;
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
            $busca = request('find');
            $dados = Cidade::where('nome', 'like', "$busca%")->paginate(5);
        }
        else
            $dados = Cidade::paginate(5);
        return $this->validaPrivilegio(view('cidade.index', compact('dados')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dados = ['insert' => true, 'estados' => Estado::all()];
        return $this->validaPrivilegio(view('cidade.create', compact('dados')));
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
            $Cidade = new Cidade();
            $Cidade->id         = $request->id;
            $Cidade->nome       = $request->nome;
            $Cidade->estado_id  = $request->estado_id;
            $Cidade->save();
        }
        return redirect()->route('cidade.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function show(Cidade $cidade)
    {
        $dados = ['cidade' => $cidade, 'visualizar' => true, 'estados' => Estado::all()];
        return $this->validaPrivilegio(view('cidade.show', compact('dados')));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function edit(Cidade $cidade)
    {
        $dados = ['cidade' => $cidade, 'insert' => true, 'estados' => Estado::all()];
        return $this->validaPrivilegio(view('cidade.edit', compact('dados')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cidade $cidade)
    {
        if ($this->permiteAcao()) {
            $cidade->id         = $request->id;
            $cidade->nome       = $request->nome;
            $cidade->estado_id  = $request->estado_id;
            $cidade->update();
        }
        return redirect()->route('cidade.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cidade $cidade)
    {
        if ($this->permiteAcao()) {
            Cidade::destroy($cidade->id);
        }
        return redirect()->route('cidade.index');
    }
}
