<?php

namespace Database\Factories;
use App\Models\Subscriber;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SubscriberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
   protected $model = Subscriber::class;
    public function definition()
    {
        return [
            'name' => $this->faker->name,
             'egn' => $this->faker->numberBetween($min = 7001010000, $max = 9912310000),
        ];
    }
}
