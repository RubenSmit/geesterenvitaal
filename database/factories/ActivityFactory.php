<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Carbon\Carbon;
use App\Activity;
use Faker\Generator as Faker;

$factory->define(Activity::class, function (Faker $faker) {
    $from = Carbon::now()->addDays($faker->numberBetween(0, 6));
    $to = $from->copy()->addMinutes($faker->numberBetween(120, 240));

    return [
        'title' => $faker->word,
        'subtitle' => $faker->sentence,
        'content' => $faker->paragraph,
        'start_time' => $from,
        'end_time' => $to,
        'location_name' => 'Erve Kampboer',
        'location_address' => 'Kampboerlaan 4, 7678 VV Geesteren, Nederland',
        'registration_url' => 'https://google.com'
    ];
});
