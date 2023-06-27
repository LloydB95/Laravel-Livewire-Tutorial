<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $city = fake()->unique()->city();

        // return [
        //     'name' => $city,
        //     'slug' => Str::slug($city),
        //     'position' => fake()->numberBetween(1, 10),
        // ];
        
        $name = $this->faker->unique()->word();

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'position' => $this->faker->unique()->randomNumber(2),
        ];
    }
}
