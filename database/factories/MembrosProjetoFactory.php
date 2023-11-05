<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\MembrosProjeto;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class MembrosProjetoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MembrosProjeto::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_projeto' => 5,
            'usr_id' => 4,
        ];
    }
}
