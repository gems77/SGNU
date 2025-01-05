<?php

namespace Database\Factories;

use App\Models\UniteEnseignement;
use Illuminate\Database\Eloquent\Factories\Factory;

class UniteEnseignementFactory extends Factory
{
    protected $model = UniteEnseignement::class;

    public function definition()
    {
        return [
            'code' => $this->faker->unique()->regexify('UE[0-9]{2}'),
            'nom' => $this->faker->sentence(3),
            'credits_ects' => $this->faker->numberBetween(2, 6),
            'semestre' => $this->faker->numberBetween(1, 6),
        ];
    }
}
