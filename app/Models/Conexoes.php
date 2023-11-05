<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conexoes extends Model
{
    use HasFactory;

    protected $table = 'conexoes'; // Nome da tabela no banco de dados

    protected $primaryKey = 'conexoes_id'; // Nome da chave primária

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_conexao',
        'usr_id',
    ];

    /**
     * Define o relacionamento com a tabela 'conexao' usando a chave estrangeira 'id_conexao'
     */
    public function conexao()
    {
        return $this->belongsToMany(Conexao::class, 'id_conexao', 'id_conexao');
    }

    /**
     * Define o relacionamento com a tabela 'users' usando a chave estrangeira 'usr_id'
     */
    public function user()
    {
        return $this->belongsToMany(User::class, 'usr_id', 'usr_id');
    }


}
