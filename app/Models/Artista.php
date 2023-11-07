<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    use HasFactory;

     protected $table = 'artistas';
     protected $primaryKey = 'id_art'; // Nome da chave primária
     protected $fillable = [
       'nome',
       'descricao'
     ];


}
