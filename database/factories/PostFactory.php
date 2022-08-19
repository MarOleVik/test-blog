<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'title' => $this->faker->text(200),
            'description' => $this->faker->text(200),
            'text' => $this->faker->realText(2000),
            'image' => $this->faker->imageUrl(640, 480),
            'type' => $this->faker->numberBetween(0, 1),
            'status' => $this->faker->numberBetween(0, 3),


        ];
    }
}
