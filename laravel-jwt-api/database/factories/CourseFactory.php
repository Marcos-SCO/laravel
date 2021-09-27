<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => function () {
                return User::inRandomOrder()->first()->id;
            },
            'title' => $this->faker->title(),
            'description' => $this->faker->text(300),
            'total_videos' => $this->faker->randomDigitNotZero(3, 50),
        ];
    }
}
