<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

//$users = App\User::lists('id');

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => 'password',
        'remember_token' => str_random(10)
    ];
});

$factory->define(App\Status::class, function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->randomElement(App\User::lists('id')->toArray()),
        'body' => $faker->paragraph,
        'created_at' => $faker->dateTime()
    ];
});
