<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaVirtual extends Model
{
    protected $fillable = ['nome', 'descricao', 'disciplina_id'];

    public function disciplina() 
    {
        $this->belongsTo('App\Models\Disciplina');
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
