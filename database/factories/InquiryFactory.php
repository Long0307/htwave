<?php

namespace Database\Factories;

use App\Models\Inquiry;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class InquiryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Inquiry::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'phoneNumber' => $this->faker->text(255),
            'enquiries' => $this->faker->text(255),
        ];
    }
}
