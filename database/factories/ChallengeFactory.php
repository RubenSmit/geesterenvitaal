<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Carbon\Carbon;
use App\Challenge;
use App\ChallengeCategory;
use Faker\Generator as Faker;

$factory->define(Challenge::class, function (Faker $faker) {
    $from = Carbon::now()->addDays($faker->numberBetween(0, 6))->addMinutes($faker->numberBetween(0, 1440));
    $to = $from->copy()->addMinutes($faker->numberBetween(120, 240));

    return [
        'title' => $faker->word,
        'subtitle' => $faker->sentence,
        'content' => $faker->paragraph,
        'start_time' => $from,
        'end_time' => $to,
        'location_name' => 'Erve Kampboer',
        'location_address' => 'Kampboerlaan 13, 7678 VV Geesteren, Nederland',
        'latitude' => $faker->latitude(52.410000, 52.440000),
        'longitude' => $faker->longitude(6.720000, 6.750000),
        'challenge_category_id' => function () {
            return factory(ChallengeCategory::class)->create()->id;
        },
    ];
});
