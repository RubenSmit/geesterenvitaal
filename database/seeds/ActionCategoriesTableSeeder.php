<?php

use Illuminate\Database\Seeder;
use App\ActionCategory;
use App\Action;

class ActionCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ActionCategory::class, 5)->create()->each(function ($category) {
            factory(Action::class, 5)->create(['action_category_id'=>$category->id]);
        });
    }
}
