<?php

namespace Database\Factories;

use App\Models\ElementConstitutif;
use App\Models\UniteEnseignement;
use Illuminate\Database\Eloquent\Factories\Factory;

class ElementConstitutifFactory extends Factory
{
    protected $model = ElementConstitutif::class;

    public function definition()
    {
        return [
            'code' => $this->faker->unique()->regexify('EC-[0-9]{3}'),
            'nom' => $this->faker->sentence(3),
            'coefficient' => $this->faker->randomFloat(2, 0.5, 4.0),
            'ue_id' => UniteEnseignement::factory(),
        ];
    }
}
