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
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'old_price' => $this->faker->randomFloat(2, 1, 100),
            'new_price' => $this->faker->randomFloat(2, 1, 100),
            'description' => $this->faker->sentence,
            'detail_description' => $this->faker->paragraph,
            'origin' => $this->faker->country,
            'standard' => $this->faker->word,
            'image' => $this->faker->imageUrl(),
            'category_id' => function () {
                return \App\Models\Category::factory()->create()->id;
            },
        ];
    }
}
