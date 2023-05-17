<?php

namespace Database\Seeders;

use App\Models\Assignation;
use Illuminate\Database\Seeder;

class AssignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Assignation::factory()->count(5)->create();
    }
}
