<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Page;
use Faker\Generator as Faker;

$factory->define(Page::class, function (Faker $faker) {
    return [
        'title' => $faker->word(3),
        'subtitle' => $faker->sentence,
        'content' => $faker->paragraph
    ];
});
