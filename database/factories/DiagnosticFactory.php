<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Diagnostic;
use App\Models\Patient;
use App\Models\User;

class DiagnosticFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Diagnostic::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'patient_id' => Patient::factory(),
            'docteur_id' => User::factory(),
            'contenu' => $this->faker->word,
            'date_diag' => $this->faker->dateTime(),
        ];
    }
}
