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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    // static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' =>$password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Customer::class, function(Faker\Generator $faker){
  return [
    'firstname' => $faker->word,
    'lastname' => $faker->word,
    'email' => $faker->unique()->safeEmail,
    'address' => $faker->word,
    'gender' => $faker->boolean()
  ];
});