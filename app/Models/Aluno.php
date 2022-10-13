<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = ['pessoa_id', 'id'];

    public function pessoa()
    {
        return $this->belongsTo('App\Models\Pessoa');
    }

    public function salasVirtuais()
    {
        return $this->belongsToMany('App\Models\SalaVirtual', 'sala_virtual_alunos');
    }

}