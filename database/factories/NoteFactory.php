<?php
namespace Database\Factories;

use App\Models\Note;
use App\Models\Etudiant;
use App\Models\Ec;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoteFactory extends Factory
{
    protected $model = Note::class;

    public function definition()
    {
        return [
            'etudiant_id' => Etudiant::factory(),
            'ec_id' => Ec::factory(),
            'note' => $this->faker->randomFloat(2, 0, 20),
        ];
    }
}