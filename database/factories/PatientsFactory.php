<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Patient;
use Faker\Generator as Faker;

 function getGUID()
{
    if (function_exists('com_create_guid'))
    {
        return com_create_guid();
    }else
    {
        mt_srand((double)microtime()*10000);
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = chr(123)// "{"
        .substr($charid, 0, 8).$hyphen
        .substr($charid, 8, 4).$hyphen
        .substr($charid,12, 4).$hyphen
        .substr($charid,16, 4).$hyphen
        .substr($charid,20,12)
        .chr(125);// "}"
        return $uuid;
    }
}
$factory->define(Patient::class, function (Faker $faker) {

    return [
        'lname' => $faker->name,
        'fname'  => $faker->name,
        'matricule' => getGUID(),
        'description'=> $faker->name,
        'user_id'=> rand(1,20),
    ];
});
