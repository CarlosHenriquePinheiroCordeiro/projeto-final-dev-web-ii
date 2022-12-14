<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Pessoa;
use App\Models\Professor;
use App\Models\TipoUsuario;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    const TIPO_USUARIO_PROFESSOR = 2;
    const TIPO_USUARIO_ALUNO     = 3;

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
            $dados = Pessoa::where('nome', 'like', "$busca%")->orderBy('nome')->paginate(5);
        }
        else
            $dados = Pessoa::paginate(5);
        return $this->validaPrivilegio(view('usuario.index', compact('dados')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dados = ['insert' => true, 'tipo_usuarios' => TipoUsuario::all()];
        return $this->validaPrivilegio(view('usuario.create', compact('dados')));
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
            $Usuario = new User();
            $Usuario->name              = $request->nome;
            $Usuario->email             = $request->email;
            $Usuario->password          = Hash::make($request->senha);
            $Usuario->terms             = 1;
            $Usuario->tipo_usuario_id   = $request->tipo_usuario_id;
            $Usuario->save();

            $Pessoa = new Pessoa();
            $Pessoa->nome               = $request->nome;
            $Pessoa->data_nascimento    = $request->data_nascimento;
            $Pessoa->cpf                = $request->cpf;
            $Pessoa->rg                 = $request->rg;
            $Pessoa->usuario_id         = $Usuario->id;
            $Pessoa->save();

            if ($Usuario->tipo_usuario_id == self::TIPO_USUARIO_PROFESSOR) {
                $Professor = new Professor();
                $Professor->pessoa_id = $Pessoa->id;
                $Professor->save();
            } else if ($Usuario->tipo_usuario_id == self::TIPO_USUARIO_ALUNO) {
                $Aluno = new Aluno();
                $Aluno->pessoa_id = $Pessoa->id;
                $Aluno->save();
            }
        }
        return redirect()->route('usuario.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(User $usuario)
    {
        $dados = [
            'usuario'       => $usuario,
            'visualizar'    => true, 
            'pessoa'        => Pessoa::where('usuario_id', '=', $usuario->id)->get()[0],
            'tipo_usuarios' => TipoUsuario::all()
        ];
        return $this->validaPrivilegio(view('usuario.show', compact('dados')));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
    {
        $dados = [
            'usuario'       => $usuario,
            'insert'        => true,
            'immutable'     => true, 
            'pessoa'        => Pessoa::where('usuario_id', '=', $usuario->id)->get()[0],
            'tipo_usuarios' => TipoUsuario::all()
        ];
        return $this->validaPrivilegio(view('usuario.edit', compact('dados')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        if ($this->permiteAcao()) {
            $usuario->id                = $request->id;
            $usuario->usuario           = $request->usuario;
            $usuario->senha             = $request->senha;
            $usuario->tipo_usuario_id   = $request->tipo_usuario_id;
            $usuario->update();

            $Pessoa = Pessoa::where('usuario_id', '=', $usuario->id)->get()[0];
            $Pessoa->nome               = $request->nome;
            $Pessoa->data_nascimento    = $request->data_nascimento;
            $Pessoa->cpf                = $request->cpf;
            $Pessoa->rg                 = $request->rg;
            $Pessoa->usuario_id         = $usuario->id;
            $Pessoa->update();
        }
        return redirect()->route('usuario.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        if ($this->permiteAcao()) {
            $Pessoa = Pessoa::where('usuario_id', '=', $usuario->id)->get()[0];
            Pessoa::destroy($Pessoa->id);
            User::destroy($usuario->id);
        }
        return redirect()->route('usuario.index');
    }
}