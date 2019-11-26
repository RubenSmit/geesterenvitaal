<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Carbon\Carbon;
use App\Activity;
use App\ActivityCategory;
use Faker\Generator as Faker;

$factory->define(Activity::class, function (Faker $faker) {
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
        'registration_url' => 'https://google.com',
        'activity_category_id' => function () {
            return factory(ActivityCategory::class)->create()->id;
        },
    ];
});
