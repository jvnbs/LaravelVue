<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(), // Generates a random title
            'sub_title' => $this->faker->sentence(6), // A shorter subtitle
            'description' => $this->faker->paragraph(), // Generates a random paragraph
            // 'image' => "https://source.unsplash.com/random/480x480/?blog", // ✅ Always returns a valid image
            'image' => "https://robohash.org/" . uniqid() . ".png?size=480x480", // ✅ Always returns a unique image

        ];
    }
}
