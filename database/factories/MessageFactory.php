<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user_id = User::all()->random()->id;
        do{
            $to_user = User::all()->random()->id;
        }
        while ($to_user == $user_id);

        return [
            'user_id' => $user_id,
            'to_user' => $to_user,
            'text' => $this->faker->text(200),
            'read' => $this->faker->boolean,
        ];
    }
}
