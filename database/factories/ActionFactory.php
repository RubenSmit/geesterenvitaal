<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\ActionCategory;
use Carbon\Carbon;
use App\Action;
use Faker\Generator as Faker;

$factory->define(Action::class, function (Faker $faker) {
    $from = Carbon::now()->addDays($faker->numberBetween(-6, 0));
    $to = $from->copy()->addDays($faker->numberBetween(120, 240));
    $old_price = $faker->numberBetween($min = 104, $max = 200);
    $discount = $faker->numberBetween($min = 1, $max = 100);
    $new_price = $old_price - $old_price * ($discount / 100);

    return [
        'title' => $faker->word,
        'content' => $faker->paragraph,
        'start_time' => $from,
        'end_time' => $to,
        'samengezond_url' => 'https://samengezond.nl',
        'points_required' => $faker->numberBetween($min = 50, $max = 5000),
        'old_price' => $old_price,
        'discount'=> $discount,
        'new_price' => $new_price,
        'action_category_id' => function () {
            return factory(ActionCategory::class)->create()->id;
        },
    ];
});
