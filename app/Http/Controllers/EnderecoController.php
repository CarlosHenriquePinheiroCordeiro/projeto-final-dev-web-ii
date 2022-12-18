<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Endereco;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class EnderecoController extends Controller
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
            $dados = Endereco::where('rua', 'like', "$busca%")->orderBy('rua')->paginate(5);
        }
        else
            $dados = Endereco::paginate(5);
        return $this->validaPrivilegio(view('endereco.index', compact('dados')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dados = ['insert' => true, 'cidades' => Cidade::all(), 'pessoas' => Pessoa::all()];
        return $this->validaPrivilegio(view('endereco.create', compact('dados')));
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
            $Endereco = new Endereco();
            $Endereco->pessoa_id    = $request->pessoa_id;
            $Endereco->rua          = $request->rua;
            $Endereco->bairro       = $request->bairro;
            $Endereco->numero       = $request->numero;
            $Endereco->cidade_id    = $request->cidade_id;
            $Endereco->save();
        }
        return redirect()->route('endereco.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function show(Endereco $endereco)
    {
        $dados = ['endereco' => $endereco, 'visualizar' => true, 'cidades' => Cidade::all(), 'pessoas' => Pessoa::all()];
        return $this->validaPrivilegio(view('endereco.show', compact('dados')));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function edit(Endereco $endereco)
    {
        $dados = ['endereco' => $endereco, 'insert' => true, 'cidades' => Cidade::all(), 'pessoas' => Pessoa::all()];
        return $this->validaPrivilegio(view('endereco.edit', compact('dados')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Endereco $endereco)
    {
        if ($this->permiteAcao()) {
            $endereco->pessoa_id    = $request->pessoa_id;
            $endereco->rua          = $request->rua;
            $endereco->bairro       = $request->bairro;
            $endereco->numero       = $request->numero;
            $endereco->cidade_id    = $request->cidade_id;
            $endereco->update();
        }
        return redirect()->route('endereco.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function destroy(Endereco $endereco)
    {
        if ($this->permiteAcao())
            Endereco::destroy($endereco->pessoa_id);
        return redirect()->route('endereco.index');
    }
}
