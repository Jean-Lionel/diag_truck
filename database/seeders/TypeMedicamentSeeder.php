<?php

namespace Database\Seeders;

use App\Models\TypeMedicament;
use Illuminate\Database\Seeder;

class TypeMedicamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeMedicament::factory()->count(5)->create();
    }
}
