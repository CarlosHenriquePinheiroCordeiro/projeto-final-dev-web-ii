<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;

class EstadoController extends Controller
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
            $dados = Estado::where('nome', 'like', "$busca%")->orderBy('nome')->paginate(5);
        }
        else
            $dados = Estado::paginate(5);
        return $this->validaPrivilegio(view('estado.index', compact('dados')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dados = ['insert' => true];
        return $this->validaPrivilegio(view('estado.create', compact('dados')));
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
            $Estado = new Estado();
            $Estado->id     = $request->id;
            $Estado->nome   = $request->nome;
            $Estado->sigla  = $request->sigla;
            $Estado->save();
        }
        return redirect()->route('estado.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function show(Estado $estado)
    {
        $dados = ['estado' => $estado, 'visualizar' => true];
        return $this->validaPrivilegio(view('estado.show', compact('dados')));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function edit(Estado $estado)
    {
        $dados = ['estado' => $estado, 'insert' => true];
        return $this->validaPrivilegio(view('estado.edit', compact('dados')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estado $estado)
    {
        if ($this->permiteAcao()) {
            $estado->id     = $request->id;
            $estado->nome   = $request->nome;
            $estado->sigla  = $request->sigla;
            $estado->update();
        }
        return redirect()->route('estado.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estado $estado)
    {
        if ($this->permiteAcao())
            Estado::destroy($estado->id);
        return redirect()->route('estado.index');
    }
}