<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => rand(0, 1) ? 'CD' : 'BOOK',
            'title' => rand(0,1) ? ucfirst($this->faker->sentence()) : ucfirst($this->faker->word),
            'first_name' => ucfirst($this->faker->word),
            'main_name' => $this->faker->name(),
            'price' => rand(10, 1000),
            'playlength' => rand(1, 1000),
            'image' => rand(0, 1) ? 'http://localhost:8000/images/products/1.jpg' : 'http://localhost:8000/images/products/2.jpg'
        ];
    }
}
