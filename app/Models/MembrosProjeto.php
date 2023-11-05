<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembrosProjeto extends Model
{
    use HasFactory;

    protected $table = 'membros_projeto'; // Nome da tabela no banco de dados

    protected $primaryKey = 'memb_id'; // Nome da chave primária

    public $timestamps = false;

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
        return $this->belongsToMany(ProjetoMusical::class, 'id_projeto', 'id_projeto');
    }

    /**
     * Define o relacionamento com a tabela 'users' usando a chave estrangeira 'usr_id'
     */
    public function user()
    {
        return $this->belongsToMany(User::class, 'usr_id', 'usr_id');
    }
}
