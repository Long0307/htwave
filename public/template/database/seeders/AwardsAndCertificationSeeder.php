<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AwardsAndCertification;

class AwardsAndCertificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AwardsAndCertification::factory()
            ->count(5)
            ->create();
    }
}
