<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Genre;
use App\Models\Rate;
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
    public function definition(): array
    {
        return [
            'ISBN' => fake()->numberBetween(1000000, 9999999),
            'name' => fake()->text(15),
            'cover' => '/img/book_cover/default_cover.jpeg',
            'author_id' => Author::factory(),
            'number_of_pages' => fake()->numberBetween(100, 1000),
            'genre_id' => Genre::factory(),
            'publication_year' => fake()->numberBetween(1800, 2023),
            'excerpt' => fake()->paragraph(),
            'rate' => fake()->randomFloat(1, 1, 5),
            'number_of_rates' => fake()->randomNumber(),
        ];
    }
}
