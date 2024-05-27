<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;

class BookFactory extends Factory
{
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'publisher' => $this->faker->company,
            'author' => $this->faker->name,
            'genre' => $this->faker->word,
            'publication_date' => $this->faker->date,
            'word_count' => $this->faker->numberBetween(1000, 100000),
            'price' => $this->faker->randomFloat(2, 5, 100)
        ];
    }
}