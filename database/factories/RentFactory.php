<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Subscriber;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'return_date' => null,
            'get_date' => $this->faker->dateTimeBetween('-3 week', 'now')->format('Y-m-d'),
            'subscriber_id' => Subscriber::all()->random()->id,
            'book_id' => Book::all()->random()->id,
        ];
    }
}
