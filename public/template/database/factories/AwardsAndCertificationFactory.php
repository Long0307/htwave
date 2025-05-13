<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\AwardsAndCertification;
use Illuminate\Database\Eloquent\Factories\Factory;

class AwardsAndCertificationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AwardsAndCertification::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'images' => $this->faker->text(255),
            'title' => $this->faker->text(255),
            'description' => $this->faker->text(255),
            'link' => $this->faker->text(255),
        ];
    }
}
