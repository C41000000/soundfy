<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedAtividades extends Model
{
    use HasFactory;

    protected $table = 'feed_atividades'; // Nome da tabela no banco de dados

    protected $primaryKey = 'ativ_id'; // Nome da chave primária

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descricao',
        'usr_id',
        'arq_id',
    ];

    /**
     * Define o relacionamento com a tabela 'users' usando a chave estrangeira 'usr_id'
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'usr_id', 'usr_id');
    }

    /**
     * Define o relacionamento com a tabela 'arquivos' usando a chave estrangeira 'usr_id'
     */
    public function arquivos()
    {
            return $this->hasOne(Arquivo::class, 'arq_id', 'arq_id');
    }


}
