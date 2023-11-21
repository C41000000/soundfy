<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arquivo extends Model
{
    use HasFactory;

    protected $table = 'arquivos'; // Nome da tabela no banco de dados

    protected $primaryKey = 'arq_id'; // Nome da chave primária

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'caminho',
        'tipo',
    ];

    // Você pode definir validação para o campo 'tipo' para garantir que ele seja 'foto' ou 'musica'

    public function user()
    {
        return $this->belongsToMany(User::class, 'usr_id', 'usr_id')->where('tipo', 'musica');
    }
    public function teste()
    {
        return $this->belongsTo(User::class, 'usr_id', 'usr_id')->where('tipo', 'foto');
    }

}
