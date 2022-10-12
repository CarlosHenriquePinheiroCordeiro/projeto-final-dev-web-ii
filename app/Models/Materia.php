<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao'];

    public function salaVirtual() 
    {
        $this->hasMany('App\Models\SalaVirtual');
    }
}
