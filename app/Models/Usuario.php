<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = ['usuario', 'senha', 'ativo', 'termo', 'tipo_usuario_id'];

    public function tipoUsuario() 
    {
        return $this->belongsTo('App\Models\TipoUsuario');
    }

    public function pessoa() 
    {
        return $this->hasOne('App\Models\Pessoa');
    }
}
