<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musica extends Model
{
    use HasFactory;

    protected $table = 'musica'; // Nome da tabela no banco de dados

    protected $primaryKey = 'id_musica'; // Nome da chave primária

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo',
        'id_genero',
        'usr_id',
    ];

    /**
     * Define o relacionamento com a tabela 'users' usando a chave estrangeira 'usr_id'
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'usr_id', 'usr_id');
    }

    /**
     * Define o relacionamento com a tabela 'genero' usando a chave estrangeira 'id_genero'
     */
    public function genero()
    {
        return $this->belongsTo(Genero::class, 'id_genero', 'id_genero');
    }

    public function users(){
        return $this->hasOne(User::class;)
    }
}
