<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaVirtualAluno extends Model
{
    use HasFactory;

    protected $fillable = ['aluno_id', 'sala_virtual_id'];


}
