<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\ProjetoMusical;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class ProjetoMusicalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProjetoMusical::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name,
            'descricao' => $this->faker->text,
            'usr_id' => 2,
        ];
    }
}
