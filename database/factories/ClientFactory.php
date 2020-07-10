<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'nit' => $faker->phoneNumber,
        'ci' => $faker->phoneNumber,
        'nombre' => $faker->name,
        'apellido' => $faker->lastname,
        'nacimiento' => $faker->dateTime,
        'profesion' => $faker->jobTitle,
        

    ];
});
