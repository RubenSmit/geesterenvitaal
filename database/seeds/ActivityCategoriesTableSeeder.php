<?php

use App\ActivityCategory;
use App\Activity;
use Illuminate\Database\Seeder;

class ActivityCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ActivityCategory::class, 5)->create()->each(function ($category) {
            factory(Activity::class, 5)->create(['activity_category_id'=>$category->id]);
        });
    }
}
