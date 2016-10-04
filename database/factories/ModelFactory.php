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

$factory->define(PI\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
    	'Cpf' => str_random(10),
        'name' => $faker->name,
        'telefone' => $faker->phoneNumber,
        'endereço' => $faker->streetAddress,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

