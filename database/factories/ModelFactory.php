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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'username' => $faker->unique()->userName,
        'phone' => $faker->phoneNumber,
        'ci' => $faker->randomNumber(7),
        'birthday' => $faker->date('Y-m-d'),
        'active' => $faker->boolean(),
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Area::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->word,
    ];
});

$factory->define(App\Section::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->word,
    ];
});

$factory->define(App\Size::class, function (Faker\Generator $faker) {

    return [
        'size' => $faker->postcode,
    ];
});

$factory->define(App\Client::class, function (Faker\Generator $faker) {

    return [
        'full_name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'cellphone' => $faker->phoneNumber,
        'ci' => $faker->randomNumber(8),
        'address' => $faker->address,
        'email' => $faker->email,
    ];
});
