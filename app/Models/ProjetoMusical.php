<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProjetoMusical extends Model
{
    use HasFactory;

    protected $table = 'projeto_musical'; // Nome da tabela no banco de dados

    protected $primaryKey = 'id_projeto'; // Nome da chave primária

    public $timestamps = false;

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
    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'usr_id', 'usr_id');
    }

    public function musica(): HasMany
    {
        return $this->hasMany(Musica::class, 'id_musica');
    }

    public function projetoMusica(): BelongsToMany
    {
        return $this->belongsToMany(ProjetoMusica::class, 'projeto_musica', 'id_projeto');
    }
}
