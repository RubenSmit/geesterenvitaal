<?php

use App\ChallengeCategory;
use App\Challenge;
use Illuminate\Database\Seeder;

class ChallengeCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ChallengeCategory::class, 5)->create()->each(function ($category) {
            factory(Challenge::class, 5)->create(['challenge_category_id'=>$category->id]);
        });
    }
}
