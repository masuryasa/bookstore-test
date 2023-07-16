<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->words(3, true),
            'avg_rating' => fake()->randomFloat(1, 1.0, 10.0),
            'author_id' => fake()->numberBetween(1, 100),
            'category_id' => fake()->numberBetween(1, 300)
        ];
    }
}
