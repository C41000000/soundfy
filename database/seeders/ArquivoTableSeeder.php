<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArquivoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $tipo = [
            '1' => 'musica', '2' => 'foto'
        ];
        foreach (range(1, 2) as $key => $index) {
            DB::table('musica')->insert([
                'nome' => $faker->userName,
                'caminho' => $faker->text,
                'tipo' => $tipo[$key],
            ]);
        }
    }
}
