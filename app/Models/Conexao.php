<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conexao extends Model
{
    use HasFactory;

    protected $table = 'conexao'; // Nome da tabela no banco de dados

    protected $primaryKey = 'id_conexao'; // Nome da chave primária

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome_conexao',
    ];

    public $timestamps = false;
}
