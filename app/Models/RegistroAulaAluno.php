<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroAulaAluno extends Model
{
    use HasFactory;

    protected $fillable= ['registro_aula_id', 'pessoa_id', 'presenca'];

    public function getRouteKeyName()
    {
        return 'registro_aula_id';
    }

}
