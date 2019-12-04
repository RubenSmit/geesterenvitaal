<?php

use Illuminate\Database\Seeder;
use App\Page;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Page::class, 1)->create(['nav_position' => 1, 'title' => 'vitaal leven'])->each(function ($homepage) {
            factory(Page::class, 5)->create(['parent_id' => $homepage->id]);
        });
        factory(Page::class, 1)->create(['footer_position' => 1, 'title' => 'privacy']);
    }
}
