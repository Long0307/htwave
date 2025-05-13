<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TechnologyStatus;

class TechnologyStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TechnologyStatus::factory()
            ->count(5)
            ->create();
    }
}
