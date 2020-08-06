<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PatientDetails;
use Faker\Generator as Faker;

$factory->define(PatientDetails::class, function (Faker $faker) {
    return [
        'patient_id' => rand(1, 20),
        'age' => $faker->unique()->randomNumber($nbDigits = 2),
        'height' => $faker->unique()->randomNumber($nbDigits = 3),
        'patient_image' => 'Unknown.jpg',
    ];
});
