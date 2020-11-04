<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Modelos\Roles;
use Faker\Generator as Faker;

$factory->define(Roles::class, function (Faker $faker) {
    return [
        'rol'=>$faker->randomElement(['Usuario','Administrador'])
    ];
});
