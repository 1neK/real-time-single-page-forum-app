<?php

use App\Model\Question;
use App\User;
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
        factory(User::class,10)->create();
        factory(\App\Model\Category::class,5)->create();
        factory(Question::class,10)->create();
        factory(\App\Model\Reply::class,50)->create()->each(function($reply){
            return $reply->like()->save(factory(\App\Model\Like::class)->make());
        });
    }
}
