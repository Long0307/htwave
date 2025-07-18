<?php

namespace Database\Factories;

use App\Models\Technology;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TechnologyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Technology::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Background' => $this->faker->name(),
            'Slogan' => $this->faker->text(255),
            'SubTitle' => $this->faker->text(255),
            'Description' => $this->faker->text(),
            'categories_id' => $this->faker->randomNumber(),
        ];
    }
}
