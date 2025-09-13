<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name'=>$this->faker->name,
            'email'=>$this->faker->unique()->safeEmail,
            'token'=>Str::random(10),
            'age'=>$this->faker->numberBetween(1,100),
            'score'=>$this->faker->numberBetween(1,100),
            'type'=> $this->faker->numberBetween(1,10),
            'access_token'=>Str::random(10),
            'open_id'=>Str::random(10)
        ];
    }
}
