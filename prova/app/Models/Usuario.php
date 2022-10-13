<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //Podemos usar o SoftDeletes para deletar mas não excluir do banco
    //Protegendo possiveis falhas de sistema
    //use SoftDeletes;

    use HasFactory;
    protected $fillable = ['nome','cpf','sexo','endereco','cidade','estado','data_nascimento'];
}
