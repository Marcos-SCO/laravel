<?php

namespace Database\Factories;

use App\Http\Helpers\Database\Table;
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
            'name' => $this->faker->name(),
            'price' => $this->faker->numberBetween(30, 1000),
            'description' => $this->faker->text(),
            'category' => $this->faker->title(),
            'gallery' => 'https://loremflickr.com/320/240?random=' . Table::getLastId('products'),
        ];
    }
}
