<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->text(255),
            'fax' => $this->faker->text(255),
            'logo1' => $this->faker->text(255),
            'logo2' => $this->faker->text(255),
            'map' => $this->faker->text(255),
        ];
    }
}
