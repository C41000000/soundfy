<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MembrosProjetoTableSeeder extends Seeder
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
            DB::table('membros_projeto')->insert([
                'id_projeto' => $key,
                'usr_id' => $key,
            ]);
        }
    }
}
