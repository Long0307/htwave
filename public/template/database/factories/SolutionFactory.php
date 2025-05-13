<?php

namespace Database\Factories;

use App\Models\Solution;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SolutionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Solution::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Background1' => $this->faker->text(255),
            'Slogan' => $this->faker->text(255),
            'Background2' => $this->faker->text(255),
            'Title' => $this->faker->sentence(10),
            'Description' => $this->faker->sentence(15),
            'Content' => $this->faker->text(),
        ];
    }
}
