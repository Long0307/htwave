<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TechnologyCategory;

class TechnologyCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TechnologyCategory::factory()
            ->count(5)
            ->create();
    }
}
