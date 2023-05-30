<?php

namespace Database\Seeders;

use App\Models\Medicament;
use Illuminate\Database\Seeder;

class MedicamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Medicament::factory()->count(5)->create();
    }
}
