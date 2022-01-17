<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name,
        'details' => $faker->text,
        'media' => $faker->imageUrl(640,480,null,true),
        'price' => $faker->numberBetween(1000, 2000),
    ];
});
