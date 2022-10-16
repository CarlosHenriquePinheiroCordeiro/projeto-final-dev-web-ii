<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroAula extends Model
{
    use HasFactory;

    protected $fillable = ['descricao', 'data', 'qtd_aula', 'sala_virtual_id'];
}
