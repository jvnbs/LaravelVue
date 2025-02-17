<?php

namespace Database\Factories;

use App\Models\Software;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Software>
 */
class SoftwareFactory extends Factory
{
    protected $model = Software::class;
    public function definition(): array
    {
        return [
            'parent_id' => $this->faker->randomElement([0, 1]), // Random parent_id (0 or 1)
            'title' => $this->faker->sentence(), // Generates a random title
            'path' => $this->faker->sentence(), // Generates a random title
            'description' => $this->faker->paragraph(), // Generates a random paragraph
        ];
    }
}
