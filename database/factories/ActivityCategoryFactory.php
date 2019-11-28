<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ActivityCategory;
use Faker\Generator as Faker;

$factory->define(ActivityCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
