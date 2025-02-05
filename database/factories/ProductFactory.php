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
            'category_id' => \App\Models\Category::factory(), // Assuming you have a Category model
            'name' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 5, 100),  // Random price between 5 and 100
            'qty' => $this->faker->numberBetween(1, 100),  // Random quantity
            'description' => $this->faker->sentence,
            'image' => $this->faker->imageUrl(),  // Generates a random image URL
            'is_active' => '1',
            'is_deleted' => '0',
        ];
    }
}
