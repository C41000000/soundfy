<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetoMusica extends Model
{
    use HasFactory;
    protected $table = 'projeto_musica';
    protected  $fillable = [
        'id_projeto',
        'id_musica'
    ];
    protected $primaryKey = "id_projeto_musica";


}
