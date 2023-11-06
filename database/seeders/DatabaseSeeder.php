<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Arquivo::factory(10)->create();
        \App\Models\Genero::factory(10)->create();
        \App\Models\Musica::factory(10)->create();
        \App\Models\Conexao::factory(10)->create();
        \App\Models\Conexoes::factory(10)->create();
        \App\Models\FeedAtividades::factory(10)->create();
        \App\Models\ProjetoMusical::factory(10)->create();
        \App\Models\MembrosProjeto::factory(10)->create();
        \App\Models\UsuarioProjeto::factory(10)->create();
    }
}
