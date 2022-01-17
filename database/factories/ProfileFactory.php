<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        //
        'user_id' => $faker->numberBetween(1, 10),
        'user_name' => $faker->name,
        'details' => $faker->paragraph,
        'role' => $faker->randomElement(['consumer', 'garage']),
        'status' => $faker->randomElement(['approved', 'suspended', 'revision']),
        'phone' => $faker->phoneNumber,
        'verification_code' => $faker->randomDigit,
        'address' => $faker->address,
        'zip_code' => $faker->postcode,
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
        'last_login' => $faker->dateTime,
    ];
});
