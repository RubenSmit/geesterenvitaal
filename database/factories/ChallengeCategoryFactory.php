<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Carbon\Carbon;
use App\ChallengeCategory;
use Faker\Generator as Faker;

$factory->define(ChallengeCategory::class, function (Faker $faker) {
    return[
        'name' => $faker->word,
    ];
});
