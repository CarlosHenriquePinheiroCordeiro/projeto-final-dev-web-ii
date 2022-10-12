<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'data_nascimento', 'cpf', 'rg', 'usuario_id'];

    public function usuario() 
    {
        return $this->belongsTo('App\Models\Usuario');
    }

    public function aluno() 
    {
        return $this->hasOne('App\Models\Aluno');
    }

    public function professor() 
    {
        return $this->hasOne('App\Models\Professor');
    }
}
