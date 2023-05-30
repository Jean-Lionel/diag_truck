<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Diagnostic;
use App\Models\Medicament;
use App\Models\Prescription;

class PrescriptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Prescription::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'diag_id' => Diagnostic::factory(),
            'med_id' => Medicament::factory(),
            'dose' => $this->faker->word,
        ];
    }
}
