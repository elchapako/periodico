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
        'name' => $faker->firstName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
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

$factory->define(App\Note::class, function (Faker\Generator $faker){
   return[
        'title' => $faker->title,
   ];
});
