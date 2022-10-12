<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaVirtual extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'materia_id'];

    public function materia() 
    {
        $this->belongsTo('App\Models\Materia');
    }

    public function professores() 
    {
        return $this->belongsToMany('App\Models\Professor');
    }

    public function alunos()
    {
        return $this->belongsToMany('App\Models\Aluno');
    }
}
