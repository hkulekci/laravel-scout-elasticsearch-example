<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $this->faker->addProvider(new \Faker\Provider\Book($faker));
        $price = $this->faker->numberBetween(10, 1000);
        $discounted = $price - ($price * $this->faker->randomElement([0, 0.1, 0.2, 0.3]));

        return [
            'name' => $this->faker->name(),
            'price' => $price,
            'discounted_price' => $discounted,
            'description' => $this->faker->text(400)
        ];
    }
}
