<?php

namespace Database\Seeders;

use App\Models\Ad;
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
        $users = \App\Models\User::factory(10)->create();
        $ads = Ad::factory(100)->make(['user_id' => null])->each(function ($ad) use($users){
            $ad->user_id = $users->random()->id;

            $ad->save();
        });
    }
}
