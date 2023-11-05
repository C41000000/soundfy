<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjetoMusicalTableSeeder extends Seeder
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
            DB::table('projeto_musical')->insert([
                'nome' => $faker->name,
                'descricao' => $faker->text,
                'usr_id' => $key,
            ]);
        }
    }
}

