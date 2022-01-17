<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Media;
use Faker\Generator as Faker;

$factory->define(Media::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->name,
        'type' => $faker->imageUrl(640, 640),
        'path' => $faker->imageUrl(640, 640),
    ];
});
