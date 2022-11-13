<?php

use App\Http\Controllers\AmazonController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\RegistroAulaController;
use App\Http\Controllers\SalaVirtualController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/usuario'      , UsuarioController::class);
Route::resource('/disciplina'   , DisciplinaController::class);
Route::resource('/salaVirtual'  , SalaVirtualController::class);
Route::resource('/registroAula' , RegistroAulaController::class);
Route::resource('/estado'       , EstadoController::class);
Route::resource('/cidade'       , CidadeController::class);
Route::resource('/endereco'     , EnderecoController::class);
Route::resource('/amazon'       , AmazonController::class);

Route::get('/', function () {
    return view('welcome');
});