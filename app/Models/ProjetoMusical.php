<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetoMusical extends Model
{
    use HasFactory;

    protected $table = 'projeto_musical'; // Nome da tabela no banco de dados

    protected $primaryKey = 'id_projeto'; // Nome da chave primária

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'descricao',
        'usr_id',
    ];

    /**
     * Define o relacionamento com a tabela 'users' usando a chave estrangeira 'usr_id'
     */
    public function user()
    {
        return $this->belongsToMany(User::class, 'usr_id', 'usr_id');
    }
}
