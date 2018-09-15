<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'staffId' => $faker->text(10),
        'firstname' => $faker->text(20),
        'lastname' => $faker->text(20),
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('secret'),
        'mobilePhone' => $faker->randomNumber(5),
        'officePhone' => $faker->randomNumber(5),
        'team' => $faker->text(20),
        'title' => $faker->text(20),
        'role' => $faker->text(20),
        'reportsTo' => $faker->text(50),
        'datejoined' => $faker->date(),
        'user_status' => $faker->text(5),
        'added_by' => $faker->text(20),
        'remember_token' => str_random(10),
    ];
});
