<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Assignation;
use App\Models\Patient;
use App\Models\User;

class AssignationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Assignation::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'patient_id' => Patient::factory(),
            'infirmier_id' => User::factory(),
            'docteur_id' => User::factory(),
            'date_assignation' => $this->faker->dateTime(),
        ];
    }
}
