<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Optional;
use Faker\Generator as Faker;

$factory->define(Optional::class, function (Faker $faker) {
    return [

      'optional' => $faker -> unique() -> randomElement($array = array('wi_fi', 'box_auto', 'pool', 'security', 'sauna', 'sea_view'))

    ];
});
