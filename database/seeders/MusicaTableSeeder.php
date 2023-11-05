<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MusicaTableSeeder extends Seeder
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
            DB::table('musica')->insert([
                'titulo' => $faker->text,
                'id_genero' => $key,
                'created_at' => now(),
                'updated_at' => now(),
                'usr_id' => $key,
            ]);
        }
    }
}
