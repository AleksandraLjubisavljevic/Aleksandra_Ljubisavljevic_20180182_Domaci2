<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Distributor;
use App\Models\User;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'price'=> $this->faker->randomDigit(),
            'image'=>$this->faker->imageUrl(),
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'distributor_id'=>Distributor::factory(),
        ];
    }
}
