<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(ActivitiesTableSeeder::class);
        $this->call(ChallengesTableSeeder::class);
        $this->call(ActionsTableSeeder::class);
    }
}
