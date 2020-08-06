<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Events;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
            'event_title' => $faker->name,
            'start_date'=> $faker->dateTimeThisCentury($max = 'now'),
            'end_date'=>$faker->dateTimeThisCentury($max = 'now')
        ];
});
