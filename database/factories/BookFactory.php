<?php

namespace Database\Factories;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->numberBetween($min = 10000, $max = 90000),
            'title' => $this->faker->sentence,
            'author' => $this->faker->name,
            'genre_id' => Genre::all()->random()->id,
        ];
    }
}
