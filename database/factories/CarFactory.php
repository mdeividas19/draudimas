<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Owner;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->faker->addProvider(new \Faker\Provider\Fakecar($this->faker));
        return [
            'reg_number' => $this->faker->regexify('[A-Z][A-Z][A-Z]-\d\d\d'),
            'brand' => $this->faker->vehicleBrand(),
            'model' => $this->faker->vehicleModel(),
        ];
    }
}
