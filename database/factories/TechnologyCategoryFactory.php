<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\TechnologyCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class TechnologyCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TechnologyCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->text(255),
            'category_id' => \App\Models\Technology::factory(),
        ];
    }
}
