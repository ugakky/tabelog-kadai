<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $opentimes = ['09:00', '10:00', '11:00'];
        $closetimes = ['21:00', '22:00', '23:00'];
        $holidays = ['月', '火', '水', '木', '金', '土', '日'];
        $maxprices = ['3000', '4000', '5000'];
        $lowerprices = ['1000', '2000'];
        $categories = Category::all();
        $categoryIds = [];
        foreach ($categories as $category) {
            $categoryIds[] = $category->id;
        }
        return [
            "store_name" => fake()->company(),
            "telephone" => fake()->phoneNumber(),
            "address" => fake()->address(),
            "open_time" => fake()->randomElement($opentimes),
            "close_time" => fake()->randomElement($closetimes),
            "regular_holiday" => fake()->randomElement($holidays),
            "max_price" => fake()->randomElement($maxprices),
            "lower_price" => fake()->randomElement($lowerprices),
            "category_id" => fake()->randomElement($categoryIds),
        ];
    }
}
