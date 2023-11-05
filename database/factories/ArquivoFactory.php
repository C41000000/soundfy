<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\Arquivo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class ArquivoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Arquivo::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->userName(),
            'caminho' => $this->faker->text(),
            'tipo' => 'foto',
        ];
    }
}
