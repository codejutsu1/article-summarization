<?php

namespace Database\Factories;

use App\Enums\ArticleStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'text' => $this->faker->paragraph,
            'summary' => $this->faker->optional()->sentence,
            'status' => $this->faker->randomElement(ArticleStatus::cases()),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
