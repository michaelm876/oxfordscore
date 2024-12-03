<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $commentable_type = $this->faker->randomElement($array = array ("App\Models\Hip","App\Models\Knee","App\Models\Shoulder"));

        return [
            'user_id' => User::where('id', '>', 1)->get()->random()->id,
            'commentable_type' => $commentable_type,
            'commentable_id' => $commentable_type::all()->random()->id,
            'body' => $this->faker->paragraph(),
        ];
    }
}
