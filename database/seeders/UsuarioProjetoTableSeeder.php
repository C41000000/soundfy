<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioProjetoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $key => $index) {
            DB::table('usuario_projeto')->insert([
                'id_projeto' => $key,
                'usr_id' => $key,
            ]);
        }
    }
}

