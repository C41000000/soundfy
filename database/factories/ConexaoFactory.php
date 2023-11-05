<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\Conexao;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class ConexaoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Conexao::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome_conexao' => $this->faker->text(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
