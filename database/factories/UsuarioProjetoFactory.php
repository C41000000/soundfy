<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\UsuarioProjeto;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class UsuarioProjetoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UsuarioProjeto::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_projeto' => 1,
            'usr_id' => 7,
        ];
    }
}
