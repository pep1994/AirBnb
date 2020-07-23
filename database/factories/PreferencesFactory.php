<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Preference;
use Faker\Generator as Faker;

$factory->define(Preference::class, function (Faker $faker) {
    return [
        'user_id' => $faker -> numberBetween($min = 1, $max = 100)
    ];
});
