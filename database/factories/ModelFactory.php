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
        'pages' => 4,
        'isRegular' => true
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
        'phone' => $faker->randomNumber(8),
        'cellphone' => $faker->randomNumber(8),
        'ci' => $faker->randomNumber(8),
        'address' => $faker->address,
        'email' => $faker->email,
    ];
});

$factory->define(App\Note::class, function (Faker\Generator $faker){
   return[
        'title' => $faker->realText(150),
        'note'  => $faker->realText(2500)
   ];
});

$factory->define(App\Edition::class, function (Faker\Generator $faker){
   return[
       'date'  => $faker->date(),
       'number_of_edition' => $faker->randomNumber(4),
       'status' => $faker->randomElement(['active', 'next', 'done'])
   ];
});

$factory->define(App\Editionsection::class, function (Faker\Generator $faker){
   return[
       'section_id' => function () {
           return factory(App\Section::class)->create()->id;
       },
       'edition_id' => function () {
           return factory(App\Edition::class)->create()->id;
       }
   ];
});

$factory->define(App\Page::class, function (Faker\Generator $faker){
   return[
       'page_number'        => $faker->numberBetween(1,20),
       'status'             => $faker->numberBetween(1,6),
       'editionsection_id'  => function () {
           return factory(App\Editionsection::class)->create()->id;
       }
   ];
});

$factory->define(App\Ad::class, function (Faker\Generator $faker){
   return[
       'name' => $faker->text(30),
       'color' => $faker->randomElement(['B&W', 'Full Color']),
       'client_id' => function () {
           return factory(App\Client::class)->create()->id;
       },
       'section_id' => function () {
           return factory(App\Section::class)->create()->id;
       },
       'size_id' => function () {
           return factory(App\Size::class)->create()->id;
       }
   ];
});

$factory->define(App\Model::class, function (Faker\Generator $faker){
   return[
       'name' => $faker->randomElement(['modelo 1', 'modelo 2']),
       'image' => $faker->randomElement(['modelo 1.jpg', 'modelo 2.jpg'])
   ];
});
