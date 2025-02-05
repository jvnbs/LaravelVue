<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'parent_id' => $this->faker->randomElement([null, 1, 2, 3]),
            'name' => $this->faker->word(),
            'image' => $this->faker->imageUrl(),
            'is_active' => '1',
            'is_deleted' => '0',
        ];
    }
}
