<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Adding an admin user
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@admin.com',
                'password' => \Hash::make('admin'),
            ]);
        $this->call(PermissionsSeeder::class);

        $this->call(AwardsAndCertificationSeeder::class);
        $this->call(BannerSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(InquirySeeder::class);
        $this->call(SolutionSeeder::class);
        $this->call(TechnologySeeder::class);
        $this->call(TechnologyCategorySeeder::class);
        $this->call(TechnologyStatusSeeder::class);
        $this->call(UserSeeder::class);
    }
}
