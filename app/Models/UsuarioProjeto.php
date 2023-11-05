<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioProjeto extends Model
{
    use HasFactory;

    protected $table = 'usuario_projeto'; // Nome da tabela no banco de dados

    protected $primaryKey = 'usr_projeto_id'; // Nome da chave primária

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_projeto',
        'usr_id',
    ];

    /**
     * Define o relacionamento com a tabela 'projeto_musical' usando a chave estrangeira 'id_projeto'
     */
    public function projeto()
    {
        return $this->belongsTo(ProjetoMusical::class, 'id_projeto', 'id_projeto');
    }

    /**
     * Define o relacionamento com a tabela 'users' usando a chave estrangeira 'usr_id'
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'usr_id', 'usr_id');
    }
}
