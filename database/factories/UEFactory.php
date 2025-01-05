<?php

namespace Database\Factories;

use App\Models\Ue;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ue>
 */
class UEFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
     
     protected $model = Ue::class;
    public function definition(): array
    {
        return [
            'code' => $this->faker->unique()->words(3, true),  // Génère des codes comme "UE123"
            'nom' => $this->faker->words(3, true), // Génère un nom comme "Programmation Web"
            'credits_ects' => $this->faker->numberBetween(1, 10), // Génère un entier entre 1 et 10
            'semestre' => $this->faker->numberBetween(1, 6), // Génère un entier entre 1 et 6
        ];
    }
    
}
