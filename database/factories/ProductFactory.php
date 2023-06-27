<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Country;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        $country = collect(Country::all()->modelKeys());
        
        // return [
        //     'name' => fake()->catchPhrase(),
        //     'description' => fake()->realText(),
        //     'country_id' => fake()->numberBetween(1, 240),
        //     'price' => fake()->numberBetween(100, 500),
        // ];

        return [
            'name'        => $this->faker->words(rand(2, 4), true),
            'description' => $this->faker->text(),
            'country_id'  => $country->random(),
            'price'       => $this->faker->randomNumber(rand(3, 5)),
        ];
    }

    public function configure(): self
    {
        $categories = collect(Category::where('is_active', true)->get()->modelKeys());

        return $this->afterCreating(function (Product $product) use ($categories) {
            $product->categories()->sync($categories->random(rand(1, 3)));
        });
    }
}
