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
    	'cpf' => mt_rand(10000000000,99999999999),
        'name' => $faker->name,
        'telefone' => $faker->phoneNumber,
        'endereço' => $faker->streetAddress,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(PI\Models\Despesa::class, function (Faker\Generator $faker) {


    return [
    	'valor' => $faker->randomFloat,
        'descrição' => $faker->sentence,
        'vencimento' => $faker->date('d/m/Y'),
       
    ];
});

$factory->define(PI\Models\Doacao::class, function (Faker\Generator $faker){
    return [
        'valor' => $faker->randomFloat,
        'donatario' => $faker->name,
        'data' => $faker->date('d/m/Y'),
       
    ];
});

$factory->define(PI\Models\Mensalidade::class, function (Faker\Generator $faker){
    return [
        'valor' => $faker->randomFloat,
        'status' => $faker->randomElement(["Pago","Pendente"]),
        'vencimento' => $faker->date('d/m/Y'),
       
    ];
});
