<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;
class ServiceFactory extends Factory
{
    

    protected $model = Service::class;

    public function definition(): array
    {
        return [
            'parent_id' => $this->faker->randomElement([0, 1]), // Random parent_id (0 or 1)
            'title' => $this->faker->sentence(), // Random title
            'path' => $this->faker->slug(), // Random slug path
            'description' => $this->faker->paragraph(), // Random description
        ];
    }
}
