<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shoulder>
 */
class ShoulderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'dob' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'joint' => $this->faker->randomElement($array = array ('Left','Right','Bilateral')),
            'type' => $this->faker->randomElement($array = array ('Pre Operation','Year 1 Post Operation','Year 5 Post Operation','Year 10 Post Operation','Subsequent Years')),
            'bed' => $this->faker->numberBetween($min = 0, $max = 5),
            'car' => $this->faker->numberBetween($min = 0, $max = 5),
            'cutlery' => $this->faker->numberBetween($min = 0, $max = 5),
            'dressing' => $this->faker->numberBetween($min = 0, $max = 5),
            'hair' => $this->faker->numberBetween($min = 0, $max = 5),
            'pain' => $this->faker->numberBetween($min = 0, $max = 5),
            'shopping' => $this->faker->numberBetween($min = 0, $max = 5),
            'tray' => $this->faker->numberBetween($min = 0, $max = 5),
            'usualpain' => $this->faker->numberBetween($min = 0, $max = 5),
            'wardrobe' => $this->faker->numberBetween($min = 0, $max = 5),
            'wash' => $this->faker->numberBetween($min = 0, $max = 5),
            'work' => $this->faker->numberBetween($min = 0, $max = 5),
        ];
    }
}
