<?php

namespace Database\Factories;

use App\Models\Shipment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Shipment>
 */
class ShipmentFactory extends Factory
{
    protected $model = Shipment::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'from_city' => $this->faker->city(),
            'from_country' => $this->faker->country(),
            'to_city' => $this->faker->city(),
            'to_country' => $this->faker->country(),
            'price' => $this->faker->numberBetween(100, 5000),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'user_id' => \App\Models\User::factory(),
            'details' => $this->faker->paragraph(3),
        ];
    }
}
