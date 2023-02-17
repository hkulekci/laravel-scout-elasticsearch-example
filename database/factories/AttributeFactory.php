<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class AttributeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
        ];
    }

    public function withGroup($id): AttributeFactory
    {
        return $this->state(function (array $attributes) use ($id) {
            return [
                'attribute_group_id' => $id,
            ];
        });
    }
}
