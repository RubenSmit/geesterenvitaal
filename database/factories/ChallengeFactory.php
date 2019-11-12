<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Carbon\Carbon;
use App\Challenge;
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
        'latitude' => 52.4217347,
        'longitude' => 6.7339456,
    ];
});
