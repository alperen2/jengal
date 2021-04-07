<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'detail' => $this->faker->sentence(200),
            'minPrice' => $this->faker->biasedNumberBetween(1,10),
            'maxPrice' => $this->faker->biasedNumberBetween(11,20),
            'tags' => json_encode([$this->faker->biasedNumberBetween(1,4),$this->faker->biasedNumberBetween(1,4),$this->faker->biasedNumberBetween(1,4)]),
            'user_id' =>  $this->faker->biasedNumberBetween(1,4),
        ];
    }
}
