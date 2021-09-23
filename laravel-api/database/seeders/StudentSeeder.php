<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = \Faker\Factory::create();

        // DB::table('students')->insert([
        //     'name' => $faker->name(),
        //     'email' => $faker->safeEmail,
        //     'phone_number' => $faker->phoneNumber,
        //     'age' => $faker->numberBetween(20, 45),
        //     'gender' => $faker->randomElement([
        //         'male',
        //         'female',
        //     ]),
        // ]);

        \App\Models\Student::factory(100)->create();
    }
}
