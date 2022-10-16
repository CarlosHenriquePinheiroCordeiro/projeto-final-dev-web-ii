<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Endereco;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class EnderecoController extends Controller
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
            $dados = Endereco::where('rua', 'like', "$busca%")->get();
        }
        else
            $dados = Endereco::all();
        return view('endereco.index', compact('dados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dados = ['insert' => true, 'cidades' => Cidade::all(), 'pessoas' => Pessoa::all()];
        return view('endereco.create', compact('dados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Endereco = new Endereco();
        $Endereco->pessoa_id    = $request->pessoa_id;
        $Endereco->rua          = $request->rua;
        $Endereco->bairro       = $request->bairro;
        $Endereco->numero       = $request->numero;
        $Endereco->cidade_id    = $request->cidade_id;
        $Endereco->save();
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
        return view('endereco.show', compact('dados'));
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
        return view('endereco.edit', compact('dados'));
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
        $endereco->pessoa_id    = $request->pessoa_id;
        $endereco->rua          = $request->rua;
        $endereco->bairro       = $request->bairro;
        $endereco->numero       = $request->numero;
        $endereco->cidade_id    = $request->cidade_id;
        $endereco->update();
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
        Endereco::destroy($endereco->pessoa_id);
        return redirect()->route('endereco.index');
    }
}
