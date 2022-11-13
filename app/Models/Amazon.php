<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amazon extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'preco', 'link'];
}