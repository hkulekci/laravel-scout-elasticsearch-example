<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ReceiptFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $products = Product::inRandomOrder()->get();
        $items = [];
        $totalPrice = 0;
        for ($i = 0; $i < $this->faker->numberBetween(0, 5); $i++) {
            $items = [
                'product_id' => $products[$i]['id'],
                'price' => $products[$i]['discounted_price'],
                'count' => $this->faker->numberBetween(1, 3)
            ];

            $totalPrice += $products[$i]['discounted_price'] * $this->faker->numberBetween(1, 3);
        }
        return [
            'user_id' => $this->faker->numberBetween(1, 100),
            'address' => $this->faker->address(),
            'total_price' => $totalPrice,
            'items' => $items,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
