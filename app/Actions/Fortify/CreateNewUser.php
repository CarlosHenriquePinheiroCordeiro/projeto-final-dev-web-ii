<?php

namespace App\Actions\Fortify;

use App\Models\Pessoa;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $usuario = new User();
        $usuario->name            = $input['name'];
        $usuario->email           = $input['email'];
        $usuario->password        = Hash::make($input['password']);
        $usuario->tipo_usuario_id = $input['tipo_usuario_id'];
        $usuario->terms           = $input['terms'] == 'ON' ? 1 : 0;
        $usuario->save();

        $pessoa = new Pessoa();
        $pessoa->nome               = $input['name'];
        $pessoa->data_nascimento    = $input['data_nascimento'];
        $pessoa->cpf                = $input['cpf'];
        $pessoa->rg                 = $input['rg'];
        $pessoa->usuario_id         = $usuario->id;
        $pessoa->save();

        return $usuario;
    }
}
