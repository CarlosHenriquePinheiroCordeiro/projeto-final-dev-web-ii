<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Laravel\Jetstream\Jetstream;
use Laravel\Fortify\Http\Requests\LoginRequest;
use Livewire\Request as LivewireRequest;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);
        Fortify::authenticateUsing(function (LoginRequest $request) {
            $user = User::where('email', $request->email)->first();
    
            if ($user && Hash::check($request->password, $user->password)) {
                $tipoUsuario = [
                    1 => 'admin',
                    2 => 'Professor',
                    3 => 'Aluno'
                ];
                session(['nome' => $user->name, 'tipo_usuario_id' => $user->tipo_usuario_id, 'tipoUsuario' => $tipoUsuario[$user->tipo_usuario_id]]);
                return $user;
            }
        });
    }

    /**
     * Configure the permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}
