<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\FeedAtividades;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class FeedAtividadesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FeedAtividades::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'descricao' => $this->faker->text(),
            'usr_id' => 7,
            'created_at' => now(),
            'updated_at' => now(),
            'arq_id' => 6,
        ];
    }
}
