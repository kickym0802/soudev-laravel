<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $table = 'tb_alunos';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $attributes = [
        'id',
        'nome',
        'matricula',
        'email',
        'status',
        'genero',
        'dataNascimento',
        'cpf'
    ];


}
