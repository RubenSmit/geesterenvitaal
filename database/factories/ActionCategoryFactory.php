<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ActionCategory;
use Faker\Generator as Faker;

$factory->define(ActionCategory::class, function (Faker $faker) {
    return[
        'name' => $faker->word,
    ];
});
