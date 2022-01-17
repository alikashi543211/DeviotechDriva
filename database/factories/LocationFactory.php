<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Location;
use Faker\Generator as Faker;

$factory->define(Location::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->randomElement([$faker->country,$faker->address,$faker->city]),
        'media' => $faker->imageUrl(640,480),
        'parent' => $faker->numberBetween(0,40),
    ];
});
