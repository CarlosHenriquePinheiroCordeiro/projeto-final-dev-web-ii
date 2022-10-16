<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = ['pessoa_id', 'rua', 'bairro', 'numero', 'cidade_id'];

    protected $primaryKey = 'pessoa_id';

    public function pessoa() 
    {
        return $this->belongsTo('App\Models\Pessoa');
    }

    public function cidade() 
    {
        return $this->belongsTo('App\Models\Cidade');
    }
}
