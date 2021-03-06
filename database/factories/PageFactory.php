<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Page;
use Faker\Generator as Faker;

$factory->define(Page::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'subtitle' => $faker->sentence,
        'content' => $faker->paragraph,
        'nav_position' => null,
        'footer_position' => null,
        'parent_id' => null,
    ];
});
