<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeedAtividadesTableSeeder extends Seeder
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
            DB::table('feed_atividades')->insert([
                'descricao' => $faker->text,
                'usr_id' => $key,
                'created_at' => now(),
                'updated_at' => now(),
                'arq_id' => $key
            ]);
        }
    }
}
